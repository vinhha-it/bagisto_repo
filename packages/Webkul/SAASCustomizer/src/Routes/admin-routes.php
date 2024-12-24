<?php

use Illuminate\Support\Facades\Route;
use Webkul\SAASCustomizer\Http\Controllers\Admin\SessionController;
use Webkul\SAASCustomizer\Http\Controllers\Admin\CompanyProfileController;
use Webkul\SAASCustomizer\Http\Controllers\Admin\CompanyAddressController;

Route::group(['prefix' => config('app.admin_url')], function () {
        
    Route::post('/login', [SessionController::class, 'store'])->name('admin.session.store');

    Route::group(['middleware' => ['admin']], function () {

        Route::controller(CompanyProfileController::class)->prefix('company/profile')->group(function () {
            Route::get('/', 'index')->name('admin.company.profile.index');

            Route::put('/{id}', 'update')->name('admin.company.profile.update');
        });

        Route::controller(CompanyAddressController::class)->prefix('company/address')->group(function () {
            Route::get('/', 'index')->name('admin.company.address.index');

            Route::get('/create', 'create')->name('admin.company.address.create');

            Route::post('/create', 'store')->name('admin.company.address.store');

            Route::get('/edit/{id}', 'edit')->name('admin.company.address.edit');

            Route::put('/{id}', 'update')->name('admin.company.address.update');
            
            Route::delete('edit/{id}', 'destroy')->name('admin.company.address.delete');
    
            Route::post('/mass-delete', 'massDestroy')->name('admin.company.address.mass_delete');
        });
    });
});