<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Payment;
use App\Models\Pricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function checkout($deviceId, $pricingId)
    {
        $device = Device::with('user')->findOrFail($deviceId);
        $pricing = Pricing::with('partner')->findOrFail($pricingId);

        return view('user-pages.checkout', compact('device', 'pricing'));
    }

    public function initiatePayment(Request $request)
    {
        $data = $request->all();

        // Save payment in DB with pending status
        $payment = Payment::create([
            'user_id' => auth()->id(),
            'partner_id' => Pricing::find($data['pricing_id'])->partner_id,
            'device_id' => $data['device_id'],
            'pricing_id' => $data['pricing_id'],
            'amount' => $data['amount'],
            'currency' => $data['currency'],
            'payment_method' => 'flutterwave',
            'status' => 'pending',
        ]);

        $payment->update([
            'tx_ref' => $payment->id . '-' . Str::random(10)
        ]);


        return redirect()->route('page.payment', $payment->id)->with('success', 'Payment initiated successfully.');
    }

    public function showPaymentPage($paymentId)
    {
        $payment = Payment::with('device', 'pricing', 'user')->findOrFail($paymentId);

        return view('user-pages.payment', compact('payment'));
    }

    public function callback(Request $request)
    {
        $transactionId = $request->transaction_id;
        $txRef = $request->tx_ref;

        $orderId = explode('-', $txRef)[0];
        $payment = Payment::findOrFail($orderId);

        $response = Http::withToken(env('FLW_SECRET_KEY'))
            ->get("https://api.flutterwave.com/v3/transactions/{$transactionId}/verify");

        if ($response->successful() && $response['data']['status'] === 'successful') {
            $payment->update([
                'transaction_id' => $transactionId,
                'status' => 'successful',
                'updated_at' => now(),
            ]);

            return redirect()->route('payment.success', $payment->id)->with('success', 'Payment completed!');
        }

        return redirect()->route('home')->with('error', 'Payment verification failed.');
    }

    public function success($id)
    {
        $payment = Payment::with('device', 'pricing')->findOrFail($id);
        return view('user-pages.success', compact('payment'));
    }

    public function failed()
    {
        return view('user-pages.failed');
    }

    public function callbackHandler(Request $request)
    {
        $status = $request->get('status');
        $transactionId = $request->get('tx_ref');

        $payment = Payment::where('transaction_id', $transactionId)->first();

        if (!$payment) {
            return redirect()->route('home')->with('error', 'Payment record not found.');
        }

        if ($status === 'successful') {
            $payment->update(['status' => 'successful']);
            return redirect()->route('home')->with('success', 'Payment successful!');
        } elseif ($status === 'cancelled') {
            $payment->update(['status' => 'cancelled']);
            return redirect()->route('home')->with('error', 'Payment cancelled.');
        } else {
            $payment->update(['status' => 'failed']);
            return redirect()->route('home')->with('error', 'Payment failed.');
        }
    }
}
