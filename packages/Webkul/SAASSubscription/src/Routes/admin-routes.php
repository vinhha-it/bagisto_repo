<?php

use Illuminate\Support\Facades\Route;
use Webkul\SAASSubscription\Http\Controllers\Admin\CheckoutController;
use Webkul\SAASSubscription\Http\Controllers\Admin\InvoiceController as AdminInvoiceController;
use Webkul\SAASSubscription\Http\Controllers\Admin\PaypalController;
use Webkul\SAASSubscription\Http\Controllers\Admin\PlanHistoryController;
use Webkul\SAASSubscription\Http\Controllers\Admin\SubscriptionController;

Route::group(['middleware' => ['web', 'super-locale']], function () {

    Route::prefix('admin')->group(function () {

        Route::group(['middleware' => ['admin']], function () {

            Route::prefix('subscription')->group(function () {
                Route::controller(SubscriptionController::class)->group(function () {

                    Route::get('/overview', 'overview')->name('admin.subscription.plan.overview');

                    Route::get('/plans', 'index')->name('admin.subscription.plan.index');

                    Route::post('/plans/{id}', 'addToCart')->name('admin.subscription.plan.add-to-cart');
                });

                Route::controller(CheckoutController::class)->group(function () {
                    Route::get('/checkout', 'index')->name('admin.subscription.checkout.index');

                    Route::post('/checkout/purchase', 'purchase')->name('admin.subscription.checkout.purchase');
                });

                Route::controller(PaypalController::class)->prefix('paypal')->group(function () {
                    Route::get('start', 'start')->name('admin.subscription.paypal.start');

                    Route::get('cancel', 'cancel')->name('admin.subscription.paypal.cancel');

                    Route::get('review', 'review')->name('admin.subscription.paypal.review');

                    Route::get('payment', 'createProfile')->name('admin.subscription.paypal.payment');
                });

                Route::controller(AdminInvoiceController::class)->prefix('invoices')->group(function () {

                    Route::get('/', 'index')->name('admin.subscription.invoice.index');

                    Route::get('/view/{id}', 'view')->name('admin.subscription.invoice.view');
                });

            });

            Route::get('/plan-history', [PlanHistoryController::class, 'index'])->name('admin.subscription.plan.history.index');

        });
    });
});
