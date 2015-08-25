<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/localisation'], function (Router $router) {
        $router->bind('countries', function ($id) {
            return app('Modules\Localisation\Repositories\CountryRepository')->find($id);
        });
        $router->resource('countries', 'CountryController', ['except' => ['show'], 'names' => [
            'index' => 'admin.localisation.country.index',
            'create' => 'admin.localisation.country.create',
            'store' => 'admin.localisation.country.store',
            'edit' => 'admin.localisation.country.edit',
            'update' => 'admin.localisation.country.update',
            'destroy' => 'admin.localisation.country.destroy',
        ]]);
        $router->bind('zones', function ($id) {
            return app('Modules\Localisation\Repositories\ZoneRepository')->find($id);
        });
        $router->resource('zones', 'ZoneController', ['except' => ['show'], 'names' => [
            'index' => 'admin.localisation.zone.index',
            'create' => 'admin.localisation.zone.create',
            'store' => 'admin.localisation.zone.store',
            'edit' => 'admin.localisation.zone.edit',
            'update' => 'admin.localisation.zone.update',
            'destroy' => 'admin.localisation.zone.destroy',
        ]]);
// append


});
