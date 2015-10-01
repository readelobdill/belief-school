<?php
namespace App\Services;


use Omnipay\Omnipay;

class Payment {

    protected $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PaymentExpress_PxPay');
        $this->gateway->setUsername(env('DPS_USERNAME'));
        $this->gateway->setPassword(env('DPS_KEY'));
        $this->gateway->setTestMode(config('app.debug'));
    }

    public function handlePayment($user, $amount) {
        $params = [
            'amount' => $amount,
            'currency' => 'NZD',
            'description' => $user->id,
            'returnUrl' => route('payments.return_url')
        ];
        $purchase = $this->gateway->purchase($params);
        $response = $purchase->send();
        if($response->isRedirect()) {
            $response->redirect();
        }

    }


    public function completePayment() {
        $payment = $this->gateway->completePurchase();
        $response = $payment->send();
        return $response;
    }
}