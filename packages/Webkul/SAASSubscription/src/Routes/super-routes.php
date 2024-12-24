<?php

use Illuminate\Support\Facades\Route;
use Webkul\SAASSubscription\Http\Controllers\Super\InvoiceController;
use Webkul\SAASSubscription\Http\Controllers\Super\IpnController;
use Webkul\SAASSubscription\Http\Controllers\Super\PlanController;
use Webkul\SAASSubscription\Http\Controllers\Super\RecurringProfileController;

/**
 * Super Settings routes.
 */
Route::group(['middleware' => ['web', 'super-locale', 'super-admin'], 'prefix' => 'super'], function () {
    /**
     * PayPal IPN route.
     */
    Route::controller(IpnController::class)->prefix('paypal/ipn')->group(function () {
        Route::get('', 'paypalIpnListener')->name('super.subscriptions.paypal.ipn');
    });

    Route::group(['middleware' => ['super-admin'], 'prefix' => 'subscriptions'], function () {
        /**
         * Subscription Plans routes.
         */
        Route::controller(PlanController::class)->prefix('plans')->group(function () {
            Route::get('', 'index')->name('super.subscriptions.plans.index');

            Route::get('create', 'create')->name('super.subscriptions.plans.create');

            Route::post('store', 'store')->name('super.subscriptions.plans.store');

            Route::get('edit/{id}', 'edit')->name('super.subscriptions.plans.edit');

            Route::post('edit/{id}', 'update')->name('super.subscriptions.plans.update');

            Route::delete('edit/{id}', 'destroy')->name('super.subscriptions.plans.delete');

            Route::post('mass-delete', 'massDestroy')->name('super.subscriptions.plans.mass_delete');
        });

        /**
         * Invoice routes.
         */
        Route::controller(InvoiceController::class)->prefix('invoices')->group(function () {
            Route::get('', 'index')->name('super.subscriptions.invoices.index');

            Route::get('view/{id}', 'view')->name('super.subscriptions.invoices.view');
        });

        /**
         * Recurring Profile routes.
         */
        Route::controller(RecurringProfileController::class)->group(function () {
            Route::get('purchased-plans/', 'index')->name('super.subscriptions.recurring_profiles.index');

            Route::get('purchased-plans/view/{id}', 'view')->name('super.subscriptions.recurring_profiles.view');

            Route::post('plans/assign/{id}', 'assign')->name('super.subscriptions.plans.assign');

            Route::get('plans/cancel/{id}', 'cancel')->name('super.subscriptions.plans.cancel');
        });
    });
});
