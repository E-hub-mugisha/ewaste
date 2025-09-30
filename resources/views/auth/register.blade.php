@extends('layouts.auth')
@section('content')

<!-- Contact Section  -->

<div class="contact-area section-padding ">
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
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name -->
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Password')" />

                                <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>

                                <x-primary-button class="ms-4">
                                    {{ __('Register') }}
                                </x-primary-button>
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