<?php

use Illuminate\Support\Facades\Route;
use Webkul\SAASCustomizer\Http\Controllers\Super\ConfigurationController;

/**
 * Super Agent Auth routes.
 */
Route::group(['middleware' => ['web', 'super-locale', 'super-admin'], 'prefix' => 'super'], function () {
    Route::get('configuration/search', [ConfigurationController::class, 'search'])->name('super.configuration.search');

    /**
     * Super Admin Configuration routes.
     */
    Route::controller(ConfigurationController::class)->prefix('configuration/{slug?}/{slug2?}')->group(function () {
        Route::get('', 'index')->name('super.configuration.index');

        Route::post('', 'store')->name('super.configuration.store');

        Route::get('{path}', 'download')->defaults('_config', [
            'redirect' => 'super.configuration.index',
        ])->name('super.configuration.download');
    });
});
