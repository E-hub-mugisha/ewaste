<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\DevicePickup;
use App\Models\DeviceTransfer;
use App\Models\Partner;
use App\Models\Payment;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index()
    {
        // Count total items
        $deviceCount = Device::count();
        $pickupCount = DevicePickup::count();
        $transferCount = DeviceTransfer::count();

        // Example: monthly pickups (group by month)
        $monthlyPickups = DevicePickup::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Fill missing months with 0
        for ($i = 1; $i <= 12; $i++) {
            if (!isset($monthlyPickups[$i])) $monthlyPickups[$i] = 0;
        }
        ksort($monthlyPickups);

        return view('admin.dashboard', [
            'deviceCount' => $deviceCount,
            'pickupCount' => $pickupCount,
            'transferCount' => $transferCount,
            'monthlyPickups' => $monthlyPickups,
        ]);
    }

    public function reports()
    {
        // Generate and return reports view
        $devices = Device::with('user')->get();
        $pickups = DevicePickup::with(['device', 'collector'])->get();
        $transfers = DeviceTransfer::with(['device','collector','partner'])->get();
        $payments = Payment::with(['device', 'user'])->get();

        return view('admin.reports', compact('devices', 'pickups', 'transfers', 'payments'));
    }


    public function exportReport($type, $format)
    {
        $fileName = "report_{$type}." . ($format === 'excel' ? 'xlsx' : 'pdf');

        if ($type === 'devices') {
            $data = Device::with('user')->get()->toArray();
        } elseif ($type === 'pickups') {
            $data = DevicePickup::with(['device', 'collector'])->get()->toArray();
        } elseif ($type === 'transfers') {
            $data = DeviceTransfer::with(['device','collector','partner'])->get()->toArray();
        } else {
            return redirect()->back()->with('error', 'Invalid report type.');
        }

        if ($format === 'excel') {
            return Excel::download(new \App\Exports\SingleReportExport($data, $type), $fileName);
        } elseif ($format === 'pdf') {
            $pdf = Pdf::loadView('admin.report_pdf', ['data' => $data, 'type' => ucfirst($type)]);
            return $pdf->download($fileName);
        } else {
            return redirect()->back()->with('error', 'Invalid format.');
        }
    }

}
