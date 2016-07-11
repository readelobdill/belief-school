<?php namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Payment;
use Auth;
use Carbon\Carbon;
use DrewM\MailChimp\MailChimp;
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

    public function pay(Request $request, MailChimp $mailChimp,$type = User::NORMAL) {
        if(!in_array($type, [User::NORMAL, User::COACHED])) {
            abort(404);
        }
        if($this->auth->user()->paid) {
            $module = $this->auth->user()->modules()->where('template', 'home')->first();
            if(!empty($module) && !$module->pivot->complete && $module->pivot->step === $module->total_parts) {
                $module->pivot->step = 3;
                $module->pivot->complete = 1;
                $module->pivot->completed_at = new Carbon();
                $module->pivot->save();
                $mailChimp->post('lists/'.config('belief.listId', '').'/members', [
                    'status' => 'subscribed',
                    'email_address' => $request->user()->email,
                    'merge_fields' => [
                        'FNAME' => $request->user()->first_name,
                        'LNAME' => $request->user()->last_name,
                        'MODNUM' => $module->order,
                        'TYPE' => $request->user()->type
                    ],
                ]);
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

    public function completePayment(MailChimp $mailChimp) {
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
            $module->pivot->step = 3;
            $module->pivot->complete = 1;
            $module->pivot->completed_at = new \Carbon\Carbon();
            $module->pivot->save();

            $mailChimp->post('lists/'.config('belief.listId', '').'/members', [
                'status' => 'subscribed',
                'email_address' => $user->email,
                'merge_fields' => [
                    'FNAME' => $user->first_name,
                    'LNAME' => $user->last_name,
                    'MODNUM' => $module->order,
                    'TYPE' => $user->type
                ],
            ]);


            if(Auth::check()) {
                return redirect(route('home', ['skip' => 4]));
            }

        } else {
            return redirect(route('payments.fail'));
        }
    }


    public function paymentFailed() {
        return view('app.payments.failed');
    }



}
