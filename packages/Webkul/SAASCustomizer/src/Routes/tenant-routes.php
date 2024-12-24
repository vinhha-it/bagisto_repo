<?php

use Illuminate\Support\Facades\Route;
use Webkul\SAASCustomizer\Http\Controllers\Super\Tenant\TenantController;
use Webkul\SAASCustomizer\Http\Controllers\Super\Tenant\CustomerController;
use Webkul\SAASCustomizer\Http\Controllers\Super\Tenant\ProductController;
use Webkul\SAASCustomizer\Http\Controllers\Super\Tenant\OrderController;

Route::group(['middleware' => ['super-locale', 'super-admin'], 'prefix' => 'super'], function () {
    
    /**
     * Super Tenant routes.
     */
    Route::controller(TenantController::class)->prefix('tenants/companies')->group(function () {
        Route::get('/', 'index')->name('super.tenants.companies.index');
    
        Route::get('/create', 'create')->name('super.tenants.companies.create');
    
        Route::post('/validate', 'validateTenant')->name('super.tenants.companies.validate');
    
        Route::get('/edit/{id}', 'edit')->name('super.tenants.companies.edit');
    
        Route::put('/edit/{id}', 'update')->name('super.tenants.companies.update');
        
        Route::get('/view/{id}', 'view')->name('super.tenants.companies.view');
    
        Route::delete('/edit/{id}', 'destroy')->name('super.tenants.companies.delete');

        Route::post('/mass-update', 'massUpdate')->name('super.tenants.companies.mass_update');
    
        Route::post('/mass-delete', 'massDestroy')->name('super.tenants.companies.mass_delete');
    });

    /**
     * Super Tenant's Customer routes.
     */
    Route::controller(CustomerController::class)->prefix('tenants/customers')->group(function () {
        Route::get('/', 'index')->name('super.tenants.customers.index');
    });

    /**
     * Super Tenant's Product routes.
     */
    Route::controller(ProductController::class)->prefix('tenants/products')->group(function () {
        Route::get('/', 'index')->name('super.tenants.products.index');
    });

    /**
     * Super Tenant's Order routes.
     */
    Route::controller(OrderController::class)->prefix('tenants/orders')->group(function () {
        Route::get('/', 'index')->name('super.tenants.orders.index');
    });
});
