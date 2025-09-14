<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        $collectors = User::where('role', 'Collector')->get();
        $devices = Device::where('status', 'submitted')->get();
        return view('user-pages.home', compact('partners', 'collectors', 'devices'));
    }

    public function about()
    {
        return view('home.about');
    }

    public function homeDevice()
    {
        $devices = Device::where('status', 'submitted')->get();
        return view('user-pages.devices', compact('devices'));
    }

    public function contact()
    {
        return view('home.contact');
    }


    public function track(Request $request)
    {
        $device = Device::where('tracking_code', $request->tracking_code)->first();
        if (!$device) {
            return back()->with('error', 'Tracking code not found.');
        }
        return view('user-pages.device-track', compact('device'));
    }

    public function pricing()
    {
        $partners = Partner::with('pricings')->get();
        return view('user-pages.pricing', compact('partners'));
    }
    // Show details + pricing for one partner
    public function showPartner(Partner $partner)
    {
        $partner->load('pricings'); // eager load pricing plans
        return view('user-pages.partner-details', compact('partner'));
    }
}
