<?php

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\TrustHosts;
use App\Http\Middleware\TrustProxies;
use App\Http\Middleware\CheckForMaintenanceMode;
use App\Http\Middleware\ValidatePostSize;
use App\Http\Middleware\TrimStrings;
use App\Http\Middleware\ConvertEmptyStringsToNull;
use App\Http\Middleware\EncryptCookies;
use App\Http\Middleware\AddQueuedCookiesToResponse;
use App\Http\Middleware\StartSession;
use App\Http\Middleware\ShareErrorsFromSession;
use App\Http\Middleware\VerifyCsrfToken;

return [
    /*
    |--------------------------------------------------------------------------
    | Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware may be assigned to groups or used individually
    | on routes. You can add your own middleware here.
    |
    */

    // Authentication middleware - check if user is logged in
    'auth' => Authenticate::class,

    // Redirect logged in users away from login/register pages
    'guest' => RedirectIfAuthenticated::class,

    // Custom role-based middleware
    'role' => RoleMiddleware::class,

    // Other default middleware examples you might want to add
    'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

    // You can add more middleware as needed here
];
