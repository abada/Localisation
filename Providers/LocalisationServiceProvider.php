<?php namespace Modules\Localisation\Providers;

use Illuminate\Support\ServiceProvider;

class LocalisationServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Localisation\Repositories\CountryRepository',
            function () {
                $repository = new \Modules\Localisation\Repositories\Eloquent\EloquentCountryRepository(new \Modules\Localisation\Entities\Country());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Localisation\Repositories\Cache\CacheCountryDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Localisation\Repositories\ZoneRepository',
            function () {
                $repository = new \Modules\Localisation\Repositories\Eloquent\EloquentZoneRepository(new \Modules\Localisation\Entities\Zone());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Localisation\Repositories\Cache\CacheZoneDecorator($repository);
            }
        );
// add bindings


    }
}
