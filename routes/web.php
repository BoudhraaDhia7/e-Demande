<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ReclamationController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckStatus;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/admin', function () {
    return redirect('login');
});

Route::get('/', function () {
    return view('pages.main_index');
});
Route::get('/reclamer', function () {
    return view('pages.reclamation');
});
Auth::routes();
//Page de contact

Route::group(['middleware' => 'auth'], function () {
    // Route::group(['middleware' => ['ipcheck']], function () {
    Route::middleware([CheckStatus::class])->group(function () {
        Route::get('/home', 'App\Http\Controllers\HomeController@index')->name(
            'home'
        );

        Route::prefix('admins')->group(function () {
            Route::get('', [AdminController::class, 'index'])->name('admins');
            Route::post('add-admin', [AdminController::class, 'store'])->name(
                'add-admin'
            );
            Route::get('detail/{id}', [AdminController::class, 'show'])->name(
                'detail-admin'
            );
            Route::put('update/{id}', [AdminController::class, 'update'])->name(
                'update-admin'
            );
            Route::get('delete/{id}', [
                AdminController::class,
                'destroy',
            ])->name('delete-admin');
           
            
        });

        Route::prefix('users')->group(function () {
            Route::get('', [UserController::class, 'index'])->name('users');
            Route::post('add-User', [UserController::class, 'store'])->name(
                'add-user'
            );
            Route::get('detail/{id}', [UserController::class, 'show'])->name(
                'detail-user'
            );
            Route::put('update/{id}', [UserController::class, 'update'])->name(
                'update-user'
            );
         
            Route::get('delete/{id}', [
                UserController::class,
                'destroy',
            ])->name('delete-user');
            
        });

        Route::prefix('reclamation')->group(function () {
           
            Route::get('', [ReclamationController::class, 'index'])->name('reclamations');
                 
            Route::post('add-reclamation', [ReclamationController::class, 'store'])->name(
                'add-reclamation'
            );
                    
            Route::get('detail/{id}', [ReclamationController::class, 'show'])->name(
                'detail-reclamation'
            );
                    
            Route::put('update/{id}', [ReclamationController::class, 'update'])->name(
                'update-reclamation'
            );

            Route::put('update/technicien/{id}', [ReclamationController::class, 'update_technicien'])->name(
                'update-technicien'
            );

         
                    
            Route::get('delete/{id}', [
                ReclamationController::class,
                'destroy',
            ])->name('delete-reclamation');
                    
        });

        Route::prefix('materials')->group(function () {
           
            Route::get('', [MaterialController::class, 'index'])->name('material');
         
            Route::post('add-material', [MaterialController::class, 'store'])->name(
                'add-material'
            );
            
            Route::get('detail/{id}', [MaterialController::class, 'show'])->name(
                'detail-material'
            );
            
            Route::put('update/{id}', [MaterialController::class, 'update'])->name(
                'update-material'
            );
            
            Route::get('delete/{id}', [
                MaterialController::class,
                'destroy',
            ])->name('delete-material');
            
        });
       

        Route::resource('user', 'App\Http\Controllers\UserController', [
            'except' => ['show'],
        ]);
        Route::get('profile', [
            'as' => 'profile.edit',
            'uses' => 'App\Http\Controllers\ProfileController@edit',
        ]);
        Route::put('profile/password', [
            'as' => 'profile.password',
            'uses' => 'App\Http\Controllers\ProfileController@password',
        ]);

       
    });
    // });
});
