@extends('layouts.auth')
@section('content')
<!-- Session Status -->

<!-- Contact Section  -->

<div class="contact-area section-padding vh-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-5 col-lg-6 wow fadeInUp" data-wow-delay=".2s">
                <div class="contact-wrap">
                    <div class="section-title">
                        <h6>{{ config('app.name') }}</h6>
                        <h2 class="text-white">Time Is The Best Way To Think About Recycling</h2>
                    </div>
                    <div class="contact-desc">
                        <p class="text-white">
                            Recycling is not just learning which bin to throw an item into. It’s about appreciating the resources that went into making the item and understanding the value of these materials. You will truly understand recycling if you change your mindset.
                        </p>
                    </div>
                    <div class="contact-list-wrap">
                        <div class="row">
                            <div class="col-12 col-md-4 col-sm-6 col-lg-6">
                                <ul class="list-unstyled contact-list">
                                    <li><i class="las la-check"></i> Reduce Greenhouse Effect</li>
                                    <li><i class="las la-check"></i>Conserv Natural Resources</li>
                                    <li><i class="las la-check"></i>Reduces Carbon Emissions</li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-4 col-sm-6 col-lg-6">
                                <ul class="list-unstyled contact-list">
                                    <li><i class="las la-check"></i>Protects Ecosystems </li>
                                    <li><i class="las la-check"></i>Economic Benefits.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-6 col-lg-6 offset-xl-1 wow fadeInUp" data-wow-delay=".4s">
                <div class="quotation-wrap">
                    <div class="quotation-inner">
                        <h5 class="quotation-heading">Sign Into your Account</h5>
                        <p class="quotation-desc">
                           Please enter your credentials to access your account.
                        </p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Your Email
                                    </label>
                                    <input class="form-control" type="email" name="email" placeholder="Your Email" required autofocus>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="col-md-12">
                                    <label>Your Password
                                    </label>
                                    <input class="form-control" type="password" name="password" placeholder="Your Password" required autocomplete="current-password">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <div class="col-md-12">
                                    <input type="checkbox" class="form-check-input" name="remember"> Remember Me
                                </div>
                                <div class="col-md-12">
                                    @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                    @endif
<br/>
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                                        {{ __('Create an account') }}
                                    </a>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="main-btn primary">Sign in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Section End -->
@endsection