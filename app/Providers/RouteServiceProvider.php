<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();
        
        $this->mapIcoRoutes();
        
        $this->mapInvestorRoutes();

    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
   protected function mapAdminRoutes()
   {
        Route::group([
            'middleware' => 'admin',
            'namespace' => $this->namespace,
            'prefix' => 'admin',
        ], function ($router) {
            require base_path('routes/admin.php');
        });
   }
    
    /**
     * Define the "ico" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapIcoRoutes()
    {
        Route::group([
            'middleware' => 'ico',
            'namespace' => $this->namespace,
            'prefix' => 'startup',
        ], function ($router) {
            require base_path('routes/ico.php');
        });
    }
    
     /**
     * Define the "Investor" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapInvestorRoutes()
    {
        Route::group([
            'middleware' => 'investor',
            'namespace' => $this->namespace,
            //'prefix' => 'investor',
        ], function ($router) {
            require base_path('routes/investor.php');
        });
    }
}
