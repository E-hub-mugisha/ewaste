<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\DeviceSubmissionMail;
use App\Mail\PickupScheduledMail;
use App\Mail\StatusUpdateMail;
use App\Models\Device;
use App\Models\DevicePickup;
use App\Models\DeviceTransfer;
use App\Models\Partner;
use App\Models\Payment;
use App\Models\Pricing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::with('user')->latest()->get();
        return view('admin.devices.index', compact('devices'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'device_name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'condition' => 'required',
            'quantity' => 'required|integer|min:1',
            'pickup_address' => 'required|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('devices', 'public');
        }

        $data['user_id'] = auth()->id();
        $data['tracking_code'] = strtoupper(Str::random(10));

        $device = Device::create($data);

        // After saving device
        Mail::to($device->user->email)->send(new DeviceSubmissionMail($device));

        return redirect()->route('partners.select', $device->id)
            ->with('success', 'Device submitted successfully, please select a company for recycling.');
    }

    public function select($deviceId)
    {
        $device = Device::findOrFail($deviceId);
        $partners = Partner::with('pricings')->get();

        return view('user-pages.select', compact('device', 'partners'));
    }

    public function proceed(Request $request, $deviceId)
    {
        $device = Device::findOrFail($deviceId);
        $pricing = Pricing::findOrFail($request->pricing_id);

        if ($device->pricing_id) {
            return redirect()->route('checkout.show', [
                'device' => $device->id,
                'pricing' => $pricing->id,
            ])->with('error', 'Pricing already selected for this device.');
        }
        // Assign pricing to device
        $device->update(['pricing_id' => $pricing->id]);

        // Redirect to checkout
        return redirect()->route('checkout.show', [
            'device' => $device->id,
            'pricing' => $pricing->id,
        ])->with('success', 'Pricing selected. Proceed to checkout.');
    }

    public function showCheckout(Request $request, $id)
    {
        $request->validate(['pricing_id' => 'required']);
        // Get the device
        $device = Device::findOrFail($id);

        // Fetch pricing options for that device (based on partner)
        $pricing = Pricing::with('partner')
            ->where('id', $device->pricing_id)
            ->first();

        if (!$pricing) {
            return redirect()->back()->with('error', 'No pricing plan found for this device.');
        }

        return view('checkout.show', compact('device', 'pricing'));
    }

    public function successStore(Device $device)
    {
        return view('user-pages.device-show', compact('device'));
    }

    public function update(Request $request, Device $device)
    {
        $data = $request->validate([
            'device_name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'condition' => 'required',
            'quantity' => 'required|integer|min:1',
            'pickup_address' => 'required|string',
            'status' => 'required'
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('devices', 'public');
        }

        $device->update($data);

        // After saving device
        Mail::to($device->user->email)->send(new DeviceSubmissionMail($device));

        return redirect()->back()->with('success', 'Device updated successfully!');
    }

    public function destroy(Device $device)
    {
        $device->delete();
        return redirect()->back()->with('success', 'Device deleted successfully!');
    }

    public function track($code)
    {
        $device = Device::where('tracking_code', $code)->firstOrFail();
        return view('devices.track', compact('device'));
    }

    public function updateDeviceStatus(Request $request, $id)
    {
        $device = Device::findOrFail($id);
        $request->validate(['status' => 'required']);
        $device->update(['status' => $request->status]);

        Mail::to($device->user->email)->send(new StatusUpdateMail($device, $device->status));

        return redirect()->back()->with('success', 'Device status updated.');
    }

    public function indexPickups()
    {
        $pickups = DevicePickup::with(['device', 'collector'])->get();
        $devices = Device::whereDoesntHave('pickups')->get();
        $collectors = User::where('role', 'collector')->get();

        return view('admin.devices.pickup', compact('pickups', 'devices', 'collectors'));
    }

    public function storePickups(Request $request)
    {
        $request->validate([
            'device_id' => 'required|exists:devices,id',
            'collector_id' => 'required|exists:users,id',
            'pickup_date' => 'required|date',
        ]);

        $pickup = DevicePickup::create($request->all());

        Mail::to($pickup->device->user->email)->send(new PickupScheduledMail($pickup));

        return back()->with('success', 'Pickup scheduled successfully.');
    }

    public function updateStatus(Request $request, DevicePickup $pickup)
    {
        $request->validate(['status' => 'required']);
        $pickup->update(['status' => $request->status]);
        return back()->with('success', 'Pickup status updated.');
    }

    public function destroyPickups(DevicePickup $pickup)
    {
        $pickup->delete();
        return back()->with('success', 'Pickup deleted.');
    }

    public function indexDeviceTransfer()
    {
        $transfers = DeviceTransfer::with(['device', 'collector', 'partner'])->get();
        $devices = Device::where('status', 'Collected')->get();
        $collectors = User::where('role', 'collector')->get();
        $partners = Partner::all();

        return view('admin.devices.transfers', compact('transfers', 'devices', 'collectors', 'partners'));
    }

    public function storeDeviceTransfer(Request $request)
    {
        $request->validate([
            'device_id' => 'required|exists:devices,id',
            'collector_id' => 'required|exists:users,id',
            'partner_id' => 'required|exists:partners,id',
        ]);

        DeviceTransfer::create($request->all());
        return redirect()->back()->with('success', 'Transfer created successfully');
    }

    public function updateStatusDeviceTransfer(Request $request, DeviceTransfer $transfer)
    {
        $request->validate([
            'status' => 'required|in:In transit,Received,Recycled'
        ]);

        $transfer->update([
            'status' => $request->status,
            'transferred_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Transfer status updated');
    }

    public function storeDevice(Request $request)
    {
        $data = $request->validate([
            'device_name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'condition' => 'required',
            'quantity' => 'required|integer|min:1',
            'pickup_address' => 'required|string',
            'photo' => 'nullable|image|max:2048',
            'partner_id' => 'required|exists:partners,id',
            'pricing_id' => 'required|exists:pricings,id',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('devices', 'public');
        }

        $data['user_id'] = auth()->id();
        $data['tracking_code'] = strtoupper(Str::random(10));

        $device = Device::create($data);
        $pricing = Pricing::find($data['pricing_id']);
        $partner = Partner::find($data['partner_id']);

        $payment = Payment::create([
            'user_id' => $device->user_id,
            'partner_id' => $partner->id,
            'device_id' => $device->id,
            'pricing_id' => $pricing->id,
            'amount' => $pricing->price,
            'currency' => 'rwf',
            'payment_method' => 'Flutterwave',
            'status' => 'pending',
        ]);

        // After saving device
        Mail::to($device->user->email)->send(new DeviceSubmissionMail($device));

        return redirect()->route('payment.checkout', $device->id)->with('success', 'Device submitted successfully! Your tracking code: ' . $data['tracking_code']);
    }

    public function checkoutOrder($deviceId)
    {
        $device = Device::where('id', $deviceId)->firstOrFail();
        return view('user-pages.checkout', compact('device'));
    }

    public function checkout(Request $request, $deviceId)
    {
        $device = Device::findOrFail($deviceId);

        if (!$device) {
            return redirect()->back()->with('error', 'Device not found.');
        }

        $tx_ref = uniqid('tx_'); // unique transaction reference

        // Save a new payment record
        $payment = Payment::create([
            'user_id' => $device->user_id,
            'partner_id' => $request->partner_id,
            'device_id' => $device->id,
            'amount' => $request->price,
            'currency' => 'rwf',
            'payment_method' => 'Flutterwave',
            'transaction_id' => $tx_ref,
            'status' => 'pending',
        ]);

        // Flutterwave payload
        $data = [
            "tx_ref" => $tx_ref,
            "amount" => $pricing->price,
            "currency" => $pricing->currency,
            "redirect_url" => route('payment.callback'),
            "customer" => [
                "email" => auth()->user()->email,
                "name" => auth()->user()->name,
            ],
            "customizations" => [
                "title" => "Device Recycling Payment",
                "description" => "Payment for recycling " . $pricing->device_type,
            ]
        ];

        // Send request to Flutterwave
        $response = Http::withToken(env('FLW_SECRET_KEY'))
            ->post('https://api.flutterwave.com/v3/payments', $data);

        $responseBody = $response->json();

        if (isset($responseBody['status']) && $responseBody['status'] === 'success') {
            return redirect($responseBody['data']['link']); // Redirect to payment page
        }

        return back()->with('error', 'Unable to initialize payment. Please try again.');
    }

    /**
     * Handle Flutterwave callback
     */
    public function callback(Request $request)
    {
        $status = $request->status;
        $tx_ref = $request->tx_ref;
        $transaction_id = $request->transaction_id;

        $payment = Payment::where('tx_ref', $tx_ref)->firstOrFail();

        if ($status === 'successful') {
            // Verify transaction with Flutterwave
            $verify = Http::withToken(env('FLW_SECRET_KEY'))
                ->get("https://api.flutterwave.com/v3/transactions/{$transaction_id}/verify");

            $verificationData = $verify->json();

            if (isset($verificationData['status']) && $verificationData['status'] === 'success') {
                $payment->update([
                    'status' => 'successful',
                    'transaction_id' => $transaction_id
                ]);

                // Update device status
                $payment->device->update(['status' => 'paid']);

                return redirect()->back()->with('success', 'Payment successful! Device submitted.');
            }
        }

        $payment->update(['status' => 'failed']);
        return redirect()->back()->with('error', 'Payment failed or cancelled.');
    }

    public function indexPayments()
    {
        $payments = Payment::with(['user', 'device', 'partner', 'pricing'])->paginate(10);
        return view('admin.payments.index', compact('payments'));
    }
}
