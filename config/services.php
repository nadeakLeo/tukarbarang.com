<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'facebook' => [
        'client_id' => '981713141994320',
        'client_secret' => 'bb3776ae08371a4b898d9ea4d918e5ae',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [
        'client_id' => '779142050503-a7uv4g554utg9gdv3v0ek1do4c7o8ku6.apps.googleusercontent.com',
        'client_secret' => 'QE1owctkqAr7nStktydkr5OY',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

];
