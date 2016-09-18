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

    'facebook' => [
        'client_id' => '579351645565112',
        'client_secret' => '767de25a9394e327622a7f09c29ae5fa',
        'redirect' => 'http://acommerce.dev/auth/facebook/callback',
    ],

    'twitter' => [
        'client_id' => 'SYs0OZsCZk6zZOHKBEPKpSAU6',
        'client_secret' => 'xY2KBD16NQIyxYDAh7ZdHYctbzoVAEngk69IYjiL9in8afVbBZ',
        'redirect' => 'http://acommerce.dev/auth/twitter/callback',
    ],

    'google' => [
        'client_id' => '300179834107-ibsga3pkqoja8qeavenppcs9ram3ha8s.apps.googleusercontent.com',
        'client_secret' => 'ic0v9N6_z6B1YLBKHcdaWoDd',
        'redirect' => 'http://acommerce.dev/auth/google/callback',
    ],

];
