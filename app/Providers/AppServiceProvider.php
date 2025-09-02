<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Registrar middleware manualmente - SOLUÇÃO ALTERNATIVA APOS TENTAR COM O Kernel.php MAS NAO FUNCIONOU
        app('router')->aliasMiddleware('onboarding', \App\Http\Middleware\CheckOnboarding::class);
        
    }
}
