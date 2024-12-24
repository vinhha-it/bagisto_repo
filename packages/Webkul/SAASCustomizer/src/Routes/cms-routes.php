<?php

use Illuminate\Support\Facades\Route;
use Webkul\SAASCustomizer\Http\Controllers\Super\Cms\PageController;

Route::group(['middleware' => ['super-locale', 'super-admin'], 'prefix' => 'super'], function () {
    
    /**
     * CMS Page routes.
     */
    Route::controller(PageController::class)->prefix('cms')->group(function () {
        Route::get('/', 'index')->name('super.cms.index');

        Route::get('/create', 'create')->name('super.cms.create');
    
        Route::post('/create', 'store')->name('super.cms.store');
    
        Route::get('/edit/{id}', 'edit')->name('super.cms.edit');
    
        Route::put('/edit/{id}', 'update')->name('super.cms.update');
    
        Route::delete('edit/{id}', 'destroy')->name('super.cms.delete');
    
        Route::post('/mass-delete', 'massDestroy')->name('super.cms.mass_delete');
    });
});
