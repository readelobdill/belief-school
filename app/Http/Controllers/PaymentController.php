<?php namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Payment;
use Carbon\Carbon;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;

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

    public function pay() {
        if($this->auth->user()->paid) {
            abort(404);
        }
        if(Carbon::now()->gt(Carbon::createFromFormat('Y-m-d H:i:s',config('belief.discountedUntil')))) {
            $amount = config('belief.price');
        } else {
            $amount = config('belief.discountedPrice');
        }
        $this->payment->handlePayment($this->auth->user(), $amount);
    }

    public function completePayment() {
        $result = $this->payment->completePayment();

        if($result->isSuccessful()) {
            $data = $result->getData();
            $userId = intval($data->MerchantReference);
            $user = User::find($userId);
            if($user->paid) {
                return redirect(route('home'));
            }
            $user->paid = true;
            $user->save();

            $module = $user->modules()->where('template', 'home')->first();
            $module->pivot->step++;
            $module->pivot->complete = 1;
            $module->pivot->completed_at = new \Carbon\Carbon();
            $module->pivot->save();
            \Session::flash('paid', true);
            return redirect(route('home'));
        } else {
            return redirect(route('payments.fail'));
        }
    }


    public function paymentFailed() {
        return view('app.payments.failed');
    }



}
