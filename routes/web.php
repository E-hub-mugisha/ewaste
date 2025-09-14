<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DeviceController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/devices', [HomeController::class, 'homeDevice'])->name('home.devices');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('home.pricing');
Route::get('/partners/{partner}', [HomeController::class, 'showPartner'])->name('partners.show');

// Device submission & tracking
Route::get('/device/submit', [DeviceController::class, 'create'])->name('device.submit');
Route::post('/device/submit', [DeviceController::class, 'store'])->name('device.store')->middleware('auth');
Route::get('/device/submit/success/{device}', [DeviceController::class, 'successStore'])->name('success-store');
Route::get('/device/track', [DeviceController::class, 'trackForm'])->name('device.track.form');
Route::post('/device/track', [HomeController::class, 'track'])->name('device.track');

Route::post('/device/store', [DeviceController::class, 'storeDevice'])->name('device.storeDevice');

Route::post('/device/{id}/checkout', [DeviceController::class, 'proceed'])->name('checkout.proceed');
Route::get('/partners/select/{id}', [DeviceController::class, 'select'])->name('partners.select');
// Route::get('/checkout/device/{id}', [DeviceController::class, 'showCheckout'])->name('checkout.show');

// web.php
Route::get('/payment/checkout/{device}', [DeviceController::class, 'checkout'])->name('payment.checkout');
Route::post('/payment/process/{device}', [DeviceController::class, 'process'])->name('payment.process');
// web.php

Route::get('/checkout/{device}/{pricing}', [PaymentController::class, 'checkout'])->name('checkout.show');
Route::post('/payment/initiate', [PaymentController::class, 'initiatePayment'])->name('payment.initiate');
Route::get('/payment/{payment}', [PaymentController::class, 'showPaymentPage'])->name('page.payment');
Route::get('/payment/device/callback', [PaymentController::class, 'callback'])->name('payment.callback');

Route::get('/payment/success/{id}', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/failed', [PaymentController::class, 'failed'])->name('payment.failed');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('users', UserController::class);

    Route::get('admin/devices', [DeviceController::class, 'index'])->name('admin.devices.index');
    Route::post('admin/devices', [DeviceController::class, 'store'])->name('admin.devices.store');
    Route::get('admin/devices/{device}', [DeviceController::class, 'show'])->name('admin.devices.show');
    Route::put('admin/devices/{device}', [DeviceController::class, 'update'])->name('admin.devices.update');
    Route::delete('admin/devices/{device}', [DeviceController::class, 'destroy'])->name('admin.devices.destroy');
    Route::get('admin/devices/track/{code}', [DeviceController::class, 'track'])->name('admin.devices.track');
    Route::put('admin/devices/{id}/status', [DeviceController::class, 'updateDeviceStatus'])->name('admin.devices.updateStatus');
    Route::get('admin/devices-pickup', [DeviceController::class, 'indexPickups'])->name('admin.devices.pickup.index');
    Route::post('admin/devices-pickup', [DeviceController::class, 'storePickups'])->name('admin.devices.pickup.store');
    Route::put('admin/devices-pickup/{pickup}', [DeviceController::class, 'updateStatus'])->name('admin.devices.pickup.updateStatus');
    Route::delete('admin/devices-pickup/{pickup}', [DeviceController::class, 'destroyPickups'])->name('admin.devices.pickup.destroy');

    Route::get('admin/partners', [PartnerController::class, 'index'])->name('admin.partners.index');
    Route::post('admin/partners', [PartnerController::class, 'store'])->name('admin.partners.store');
    Route::put('admin/partners/{partner}', [PartnerController::class, 'update'])->name('admin.partners.update');
    Route::delete('admin/partners/{partner}', [PartnerController::class, 'destroy'])->name('admin.partners.destroy');
    Route::get('admin/transfers', [DeviceController::class, 'indexDeviceTransfer'])->name('admin.transfers.index');
    Route::post('admin/transfers', [DeviceController::class, 'storeDeviceTransfer'])->name('admin.transfers.store');
    Route::put('admin/transfers/{transfer}/status', [DeviceController::class, 'updateStatusDeviceTransfer'])->name('admin.transfers.updateStatus');

    Route::get('admin/reports', [DashboardController::class, 'reports'])->name('admin.reports.index');
    Route::get('admin/reports/generate/excel', [DashboardController::class, 'generateReportExcel'])->name('admin.reports.generate');
    Route::get('admin/settings', [DeviceController::class, 'settings'])->name('admin.settings');

    // generate report
    Route::get('admin/reports/export/{type}/{format}', [DashboardController::class, 'exportReport'])->name('admin.reports.export');

    // payments routes
    Route::get('admin/payments', [DeviceController::class, 'indexPayments'])->name('admin.payments.index');
    Route::get('admin/payments/{payment}', [DeviceController::class, 'showPayment'])->name('admin.payments.show');
    Route::delete('admin/payments/{payment}', [DeviceController::class, 'destroyPayment'])->name('admin.payments.destroy');
});

require __DIR__.'/auth.php';
