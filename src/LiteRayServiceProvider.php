<?php

declare(strict_types=1);

namespace Neo\LiteRay;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Neo\LiteRay\Contracts\RayDataSource;
use Neo\LiteRay\View\Components\LogBlock;
use Neo\LiteRay\View\Components\PayloadsLog;
use Neo\LiteRay\View\Components\PayloadsQuery;

class LiteRayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->environment('local')) {
            return;
        }

        // Routes
        Route::middleware('web')->group(__DIR__.'/../routes/web.php');

        // -----------------------------------------------------------------------------------------------------------
        // Assets
        // -----------------------------------------------------------------------------------------------------------

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'literay');

        $this->loadViewComponentsAs('literay', [
            PayloadsLog::class,
            PayloadsQuery::class,
            LogBlock::class,
        ]);

        $this->publishes([
            __DIR__.'/../config/literay.php' => config_path('literay.php'),
            __DIR__.'/../resources/views' => resource_path('views/vendor/literay'),
        ]);
    }

    public function register()
    {
        if (! $this->app->environment('local')) {
            return;
        }

        $this->mergeConfigFrom(__DIR__.'/../config/literay.php', 'literay');

        $this->app->bind(RayDataSource::class, static function (): RayDataSource {
            $source = config('literay.data_source');
            $class = config("literay.data_sources.{$source}.class");

            return app($class);
        });
    }
}
