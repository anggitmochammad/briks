<?php

use App\Http\Middleware\RoleChifeEnginer;
use App\Http\Middleware\RoleManager;
use App\Http\Middleware\RoleManSup;
use App\Http\Middleware\RoleSuperVisor;
use Illuminate\Support\Facades\Route;


Route::get('logout', function () {

});
Route::get('/', 'SiteController@login');
Route::post('/prosesLogin','SiteController@prosesLogin');

Route::get('/logout', 'SiteController@logout');


Route::group(['middleware' => 'userAuth'] , function () {
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('profile', 'ProfileController@index');
    Route::post('profile', 'ProfileController@update');
    Route::middleware([RoleManager::class])->group(function () {
        // Master Users
        Route::get('users', 'Users@registration');
        Route::post('users/store', 'Users@store');
        Route::post('user/del', 'Users@destroy');
        //Maintenance
        Route::prefix('maintenance')->group(function () {
            Route::get('/', 'MaintenanceController@index');
            Route::get('create', 'MaintenanceController@create');
            Route::post('store', 'MaintenanceController@store');
        });
    });
    Route::middleware([RoleSuperVisor::class])->group(function(){
        // Master Peralatan
        Route::get('peralatan', 'PeralatanController@index');
        Route::post('peralatan/store', 'PeralatanController@store');
        Route::post('peralatan/destroy', 'PeralatanController@destroy');

        //Maintenance
        Route::post('maintenance/store', 'MaintenanceController@store');
        Route::get('maintenance/{id}', 'MaintenanceController@show');
        Route::post('maintenance/delete/{id}', 'MaintenanceController@destroy');

        //Store Perbaikan
        Route::post('perbaikan/store', 'PerbaikanController@store');
        
        //Berita Acara
        Route::get('b_acara', 'BeritaAcaraController@index');
        Route::get('b_acara/{id}', 'BeritaAcaraController@show');
        Route::get('b_acara/create/{id}', 'BeritaAcaraController@create');
        Route::post('b_acara/store', 'BeritaAcaraController@store');
    });
    Route::middleware([RoleChifeEnginer::class])->group(function () {
        Route::post('perbaikan/update' , 'PerbaikanController@update');
        Route::get('report/ce/{id}', 'PerbaikanController@PrintCE');

        // Berita Acara
        Route::get('ce/b_acara', 'BeritaAcaraController@indexCE');
        Route::get('ce/b_acara/{id}', 'BeritaAcaraController@show');
        Route::get('ce/b_acara/create/{id}', 'BeritaAcaraController@create');
        Route::post('ce/approve/b_acara', 'BeritaAcaraController@CeApprove');
        Route::post('ce/b_acara/reject', 'BeritaAcaraController@reject');
        Route::get('ce/b_acara/update_spec/{id}', 'BeritaAcaraController@updateSpec');
        Route::post('ce/b_acara/update_spec', 'BeritaAcaraController@updateSpecSave');
    });
    // Role Gabungan Manager , Supervisor , CE
    Route::middleware([RoleManSup::class])->group(function () {
        //Maintenance
        Route::prefix('maintenance')->group(function () {
            Route::get('/', 'MaintenanceController@index');
            Route::get('create', 'MaintenanceController@create');
        });
        // Req Perbaikan
        Route::prefix('perbaikan')->group(function () {
            Route::get('/', 'PerbaikanController@index');
            Route::get('/{id}', 'PerbaikanController@show');
            
        });
    });
    Route::middleware([RolePurchasing::class])->group(function () {
        Route::prefix('purchasing')->group(function () {
            Route::get('/', 'PurchasingController@index');
            Route::get('detail/{id}', 'PurchasingController@show');
            Route::get('print/{id}', 'PurchasingController@print_invoice');
        });
        Route::post('pembayaran', 'PurchasingController@pembayaran');
    });
});

Route::get('test', function () {
    return redirect()->back()->with('success' , "1 data diupdate");
});
