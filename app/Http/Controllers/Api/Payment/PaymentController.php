<?php

namespace App\Http\Controllers\Api\Payment;

use PayPal;
use App\Models\Payment;
use App\Models\SubScription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Srmklive\PayPal\Services\PayPal as PayPalClient;



class PaymentController extends Controller
{
    public $package;


    public function payment($package_id)
    {
        $this->package = SubScription::where('id', $package_id)->first();


        // $data = [];
        // $data['items'] = [
        //     [
        //         'name' =>  $this->package->name,
        //         'price' =>   $this->package->price,
        //         'desc' =>  '',
        //         'qty'  =>  $this->package->month
        //     ]
        // ];

        // $data['invoice_id'] = random_int(1, 9999999999999);
        // $data['invoice_description'] = "Order # {$data['invoice_id']} Invoice";
        // $data['return_url'] = route('payment.success');
        // $data['cancel_url'] = route('payment.cancel');
        // $data['total'] = $this->package->price * $this->package->month;


        $provider = new PayPalClient;
        
        $provider->setApiCredentials(config('paypal'));

        $response = $provider->addProductById('PROD-XYAB12ABSB7868434')
            ->addBillingPlanById('P-5ML4271244454362WXNWU5NQ')
            ->addCustomPlan($this->package->name, $this->package->name, $this->package->price, 'MONTH', $this->package->month)
            ->setReturnAndCancelUrl('http://localhost:8000//payment/success', 'https://localhost:8000/payment/cancel')
            // ->setReturnAndCancelUrl('http://somaliasky.com/paypal-success', 'https://somaliasky.com/paypal-cancel')
            ->setupSubscription('John Doe', 'john@example.com', '2024-9-2');


        // $response = $provider->createOrder($data);

        // dd($provider->getAccessToken());

        return response()->json(['payment_link' => $response]);
    }

    public function cancel()
    {
        return response()->json(['message' => 'Payment Canceled']);
    }


    public function success(Request $request)
    {
        dd("done");
        $provider = new PayPalClient;
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
