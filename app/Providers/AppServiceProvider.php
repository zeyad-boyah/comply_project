<?php

namespace App\Providers;

use App\Contracts\DocumentChecker;
use Illuminate\Support\ServiceProvider;
use App\Services\PdfChecker;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    // public $bindings = [
    //     DocumentChecker::class => PdfChecker::class,
    // ];

    public function register(): void
    {
        //
        $this->app->bind(DocumentChecker::class, PdfChecker::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
