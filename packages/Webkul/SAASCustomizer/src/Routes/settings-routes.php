<?php

use Illuminate\Support\Facades\Route;
use Webkul\SAASCustomizer\Http\Controllers\Super\Settings\AgentController;
use Webkul\SAASCustomizer\Http\Controllers\Super\Settings\RoleController;
use Webkul\SAASCustomizer\Http\Controllers\Super\Settings\LocaleController;
use Webkul\SAASCustomizer\Http\Controllers\Super\Settings\CurrencyController;
use Webkul\SAASCustomizer\Http\Controllers\Super\Settings\ExchangeRateController;
use Webkul\SAASCustomizer\Http\Controllers\Super\Settings\ChannelController;
use Webkul\SAASCustomizer\Http\Controllers\Super\Settings\ThemeController;
use Webkul\SAASCustomizer\Http\Controllers\Super\Settings\EmailController;

/**
 * Super Settings routes.
 */
Route::group(['middleware' => ['super-locale', 'super-admin'], 'prefix' => 'super'], function () {
    Route::prefix('settings')->group(function () {

        /**
         * Agent routes.
         */
        Route::controller(AgentController::class)->prefix('agents')->group(function () {
            Route::get('', 'index')->name('super.settings.agents.index');
            
            Route::post('create', 'store')->name('super.settings.agents.store');

            Route::get('edit/{id}', 'edit')->name('super.settings.agents.edit');
            
            Route::put('edit', 'update')->name('super.settings.agents.update');

            Route::delete('edit/{id}', 'destroy')->name('super.settings.agents.delete');

            Route::get('confirm/{id}', 'confirm')->name('super.settings.agents.confirm');
            
            Route::put('confirm', 'destroySelf')->name('super.settings.agents.destroy');

            Route::post('mass-delete', 'massDestroy')->name('super.settings.agents.mass_delete');
        });
            
        /**
         * Roles routes.
         */
        Route::controller(RoleController::class)->prefix('roles')->group(function () {
            Route::get('', 'index')->name('super.settings.roles.index');

            Route::get('create', 'create')->name('super.settings.roles.create');

            Route::post('create', 'store')->name('super.settings.roles.store');

            Route::get('edit/{id}', 'edit')->name('super.settings.roles.edit');

            Route::put('edit/{id}', 'update')->name('super.settings.roles.update');

            Route::delete('edit/{id}', 'destroy')->name('super.settings.roles.delete');

            Route::post('mass-delete', 'massDestroy')->name('super.settings.roles.mass_delete');
        });
            
        /**
         * Locales routes.
         */
        Route::controller(LocaleController::class)->prefix('locales')->group(function () {
            Route::get('', 'index')->name('super.settings.locales.index');

            Route::post('create', 'store')->name('super.settings.locales.store');

            Route::get('edit/{id}', 'edit')->name('super.settings.locales.edit');

            Route::put('edit', 'update')->name('super.settings.locales.update');

            Route::delete('edit/{id}', 'destroy')->name('super.settings.locales.delete');

            Route::post('mass-delete', 'massDestroy')->name('super.settings.locales.mass_delete');
        });
        
        /**
         * Currencies routes.
         */
        Route::controller(CurrencyController::class)->prefix('currencies')->group(function () {
            Route::get('', 'index')->name('super.settings.currencies.index');

            Route::post('create', 'store')->name('super.settings.currencies.store');

            Route::get('edit/{id}', 'edit')->name('super.settings.currencies.edit');

            Route::put('edit', 'update')->name('super.settings.currencies.update');

            Route::delete('edit/{id}', 'destroy')->name('super.settings.currencies.delete');
    
            Route::post('/mass-delete', 'massDestroy')->name('super.settings.currencies.mass_delete');
        });
        
        /**
         * Currency Exchange-Rate routes.
         */
        Route::controller(ExchangeRateController::class)->prefix('exchange-rates')->group(function () {
            Route::get('', 'index')->name('super.settings.exchange_rates.index');

            Route::post('create', 'store')->name('super.settings.exchange_rates.store');

            Route::get('edit/{id}', 'edit')->name('super.settings.exchange_rates.edit');

            Route::get('update-rates', 'updateRates')->name('super.settings.exchange_rates.update_rates');

            Route::put('edit', 'update')->name('super.settings.exchange_rates.update');

            Route::delete('edit/{id}', 'destroy')->name('super.settings.exchange_rates.delete');

            Route::post('mass-delete', 'massDestroy')->name('super.settings.exchange_rates.mass_delete');
        });
        
        /**
         * Channel routes.
         */
        Route::controller(ChannelController::class)->prefix('channels')->group(function () {
            Route::get('', 'index')->name('super.settings.channels.index');

            Route::get('edit/{id}', 'edit')->name('super.settings.channels.edit');

            Route::put('edit/{id}', 'update')->name('super.settings.channels.update');
        });
        
        /**
         * Theme routes.
         */
        Route::controller(ThemeController::class)->prefix('themes')->group(function () {
            Route::get('', 'index')->name('super.settings.themes.index');
    
            Route::get('edit/{id}', 'edit')->name('super.settings.themes.edit');
    
            Route::post('store', 'store')->name('super.settings.themes.store');
    
            Route::post('edit/{id}', 'update')->name('super.settings.themes.update');
    
            Route::delete('edit/{id}', 'destroy')->name('super.settings.themes.delete');

            Route::post('mass-delete', 'massDestroy')->name('super.settings.themes.mass_delete');
        });

        /**
         * Email Template routes.
         */
        Route::controller(EmailController::class)->prefix('email')->group(function () {
            Route::get('create', 'create')->name('super.settings.email.create');
            
            Route::post('send', 'send')->name('super.settings.email.send');
        });
    });
});
