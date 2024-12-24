<?php

use Illuminate\Support\Facades\Route;
use Webkul\SAASCustomizer\Http\Controllers\Company\HomeController;
use Webkul\SAASCustomizer\Http\Controllers\Company\CompanyController;
use Webkul\SAASCustomizer\Http\Controllers\Company\PurgeController;
use Webkul\SAASCustomizer\Http\Controllers\Company\PagePresenterController;

Route::group(['middleware' => ['company-locale', 'company-theme'], 'prefix' => 'company'], function () {
    
    /**
     * Company Home Page routes.
     */
    Route::controller(HomeController::class)->prefix('home')->group(function () {
        Route::get('/', 'index')->name('saas.home.index');
    });
    
    /**
     * Company Register routes.
     */
    Route::controller(CompanyController::class)->prefix('register')->group(function () {
        Route::get('/', 'create')->name('company.create.index');

        Route::post('/', 'store')->name('company.create.store');
    });
    
    /**
     * Register's Validate routes.
     */
    Route::controller(CompanyController::class)->prefix('validate')->group(function () {
        Route::post('/step-one', 'validateStepOne')->name('company.validate.step-one');
        
        Route::post('/step-two', 'validateStepTwo')->name('company.validate.step-two');

        Route::post('/step-three', 'validateStepThree')->name('company.validate.step-three');
    });
    
    /**
     * Company's Seeder routes.
     */
    Route::controller(PurgeController::class)->prefix('seed-data')->group(function () {
        Route::get('/', 'seedDatabase')->name('company.create.data');
    });
    
    /**
     * Company's CMS Pages.
     */
    Route::controller(PagePresenterController::class)->prefix('page')->group(function () {
        Route::get('/{slug}', 'presenter')->name('company.cms.page');
    });
});