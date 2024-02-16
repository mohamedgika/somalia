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
    public function payment(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('payment.success'),
                "cancel_url" => route('payment.cancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->price
                    ]
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('payment.cancel')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('payment.create')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function cancel()
    {
        return response()->json(['message' =>  $response['message'] ?? 'You have canceled the transaction.']);
    }

    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $payment = Payment::create([
                'type' => 'paypal',
                'status' => 1,
                'user_id' => auth()->user()->id,
                'subscription_id' => $request->id,
                'expire_at' => Carbon::now()->addMonths($request->month)
            ]);
            return response()->json(['message' => 'Paid Success']);
        } else {
            return redirect()
                ->route('payment.create')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
}
