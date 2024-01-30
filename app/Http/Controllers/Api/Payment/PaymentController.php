<?php

namespace App\Http\Controllers\Api\Payment;

use PayPal;
use App\Models\Payment;
use App\Models\SubScription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Srmklive\PayPal\Services\PayPal as PayPalClient;



class PaymentController extends Controller
{
    protected $package;


    public function payment($package_id)
    {
        $this->package = SubScription::where('id', $package_id)->first();

        $data = [];
        $data['items'] = [
            [
                'name' =>  $this->package->name,
                'price' =>   $this->package->price,
                'desc' =>  '',
                'qty'  =>  $this->package->month
            ]
        ];

        $data['invoice_id'] = random_int(1, 9999999999999);
        $data['invoice_description'] = "Order # {$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = $this->package->price * $this->package->month;

        $provider = new PayPalClient;
        
        $response = $provider->setProvider($data, true);

        return response()->json(['payment_link' => $response['paypal_link']]);
    }

    public function cancel()
    {
        return response()->json(['message' => 'Payment Canceled']);
    }


    public function success(Request $request)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            $payment = Payment::create([
                'type' => 'paypal',
                'status' => 1,
                'user_id' => auth()->user()->id,
                'subscription_id' => $this->package->id,
                'expire_at' => now()->addMonths($this->package->month)
            ]);
            return response()->json(['message' => 'Paid Success']);
        }

        return response()->json(['message' => 'Paid Fail']);
    }
}
