<?php namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Payment;
use Auth;
use Carbon\Carbon;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Payment Controller
    |--------------------------------------------------------------------------
    |
    */

    protected $auth;
    protected $payment;
    protected $request;

    /**
     * Create a new controller instance.
     *
     * @param Guard $auth
     * @param Payment $payment
     * @param Request $request
     */
    public function __construct(Guard $auth, Payment $payment, Request $request) {
        $this->auth = $auth;
        $this->payment = $payment;
        $this->request = $request;
    }

    private function getExistingContact($email){
        $contacts = \Infusionsoft_DataService::query(new \Infusionsoft_Contact(), array('Email' => $email));
        return isset($contacts[0]) ? $contacts[0] : [];
    }

    public function pay(Request $request, $type = User::NORMAL) {
        if(!in_array($type, [User::NORMAL, User::COACHED])) {
            abort(404);
        }
        if($this->auth->user()->paid) {
            $module = $this->auth->user()->modules()->where('template', 'home')->first();
            if(!empty($module) && !$module->pivot->complete && $module->pivot->step === $module->total_parts) {
                $module->pivot->step = 2;
                $module->pivot->complete = 1;
                $module->pivot->completed_at = new Carbon();
                $module->pivot->save();

                \Session::flash('paid', true);
                return redirect(route('home'));
            }

            return redirect(route('modules.view', 'welcome-to-belief-school'));
        }
        if(Carbon::now()->gt(Carbon::createFromFormat('Y-m-d H:i:s',config('belief.discountedUntil')))) {
            $amount = config('belief.price.'.$type);
        } else {
            $amount = config('belief.discountedPrice');
        }
        $this->payment->handlePayment($this->auth->user(), $amount, $type);
    }

    public function completePayment() {
        $result = $this->payment->completePayment();

        if($result->isSuccessful()) {
            $data = $result->getData();
            $userInfo = explode(',',$data->MerchantReference);
            $userId = intval($userInfo[0]);
            $type = $userInfo[1];
            $user = User::find($userId);
            \Session::flash('paid', true);
            if($user->paid) {
                return redirect(route('home'));
            }
            $user->paid = true;
            $user->type = $type;
            $user->save();

            $module = $user->modules()->where('template', 'home')->first();
            //if creating clarity has already been done go to welcome-to-belief-school
            $module->pivot->step = $module->pivot->data ? 2 : 1;
            $module->pivot->complete = 1;
            $module->pivot->completed_at = new \Carbon\Carbon();
            $module->pivot->save();

            $contact = $this->getExistingContact($user->email);
            if($contact){
                \Infusionsoft_ContactService::removeFromGroup($contact->Id, config('belief.infusionsoftTagUnpaid', ''));
                \Infusionsoft_ContactService::addToGroup($contact->Id, config('belief.infusionsoftTagPaid', ''));
            }

            if(Auth::check()) {
                return redirect(route('home'));
            }

        } else {
            return redirect(route('payments.fail'));
        }
    }


    public function paymentFailed() {
        return view('app.payments.failed');
    }



}
