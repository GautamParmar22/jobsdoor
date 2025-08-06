<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Opcodes\LogViewer\Facades\LogViewer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // log viewer route only allow for authenticated user with @gmail email.
    //   LogViewer::auth(function ($request) {
    //     return str_contains(
    //         $request->user()?->email,
    //         '@gmail'
    //     );
    // });

    }
}
