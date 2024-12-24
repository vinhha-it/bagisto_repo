<?php

use Illuminate\Support\Facades\Route;
use Webkul\SAASCustomizer\Http\Controllers\Controller;
use Webkul\SAASCustomizer\Http\Controllers\Admin\DataGridController;
use Webkul\SAASCustomizer\Http\Controllers\Super\Agent\SessionController;
use Webkul\SAASCustomizer\Http\Controllers\Super\Agent\ForgetPasswordController;
use Webkul\SAASCustomizer\Http\Controllers\Super\Agent\ResetPasswordController;
use Webkul\SAASCustomizer\Http\Controllers\Super\Agent\AccountController;

/**
 * Super Agent Auth routes.
 */
Route::group(['middleware' => ['web', 'super-locale'], 'prefix' => 'super'], function () {

    /**
     * Redirect route.
     */
    Route::get('/', [Controller::class, 'redirectToLogin']);
    
    /**
     * Super user routes.
     */
    Route::controller(SessionController::class)->prefix('login')->group(function () {
        /**
         * Login routes.
         */
        Route::get('', 'create')->name('super.session.create');

        /**
         * Login post route to super-admin auth controller.
         */
        Route::post('', 'store')->name('super.session.store');
    });

    /**
     * Forget password routes.
     */
    Route::controller(ForgetPasswordController::class)->prefix('forget-password')->group(function () {
        Route::get('', 'create')->name('super.forget_password.create');

        Route::post('', 'store')->name('super.forget_password.store');
    });

    /**
     * Reset password routes.
     */
    Route::controller(ResetPasswordController::class)->prefix('reset-password')->group(function () {
        Route::get('{token}', 'create')->name('super.reset_password.create');

        Route::post('', 'store')->name('super.reset_password.store');
    });

    Route::group(['middleware' => ['super-admin']], function () {

        /**
         * Admin profile routes.
         */
        Route::controller(AccountController::class)->prefix('agents/account')->group(function () {
            Route::get('', 'edit')->name('super.agents.account.edit');
    
            Route::put('', 'update')->name('super.agents.account.update');
        });
        
        Route::delete('logout', [SessionController::class, 'destroy'])->name('super.session.destroy');

        /**
         * Datagrid routes.
         */
        Route::get('datagrid/look-up', [DataGridController::class, 'lookUp'])->name('super.datagrid.look_up');
    });
});
