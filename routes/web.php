<?php

use Illuminate\Support\Facades\Route;

// BACKEND
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\AdminRegisterController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;


// AJAX
use App\Http\Controllers\Ajax\LocationController;


// FRONTEND
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PageController;


// BACKEND
Route::prefix('/admin')->name('admin.')->group(function () {

    Route::prefix('/auth')->name('auth.')->group(function () {
        Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->middleware('adminLogin')->name('login');
        Route::post('/login', [AdminLoginController::class, 'login'])->name('postLogin');
        Route::post('/logout', [AdminLoginController::class, 'logout'])->middleware('auth:admin')->name('logout');
    });

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::prefix('/admins')->name('admin.')->group(function () {
            Route::get('/', [AdminController::class, 'index'])->name('index');        // all admins
            Route::post('/search', [AdminController::class, 'index'])->name('search');        // search
            Route::post('/perPage', [AdminController::class, 'index'])->name('perPage');        // perPage
            Route::post('/filterAdminGroup', [AdminController::class, 'index'])->name('filterAdminGroup');        // filterAdminGroup
            Route::post('/filterStatus', [AdminController::class, 'index'])->name('filterStatus');        // filterStatus
            Route::get('/create', [AdminController::class, 'create'])->name('create'); // show add admin page
            Route::post('/', [AdminController::class, 'store'])->name('store');       // add admin method
            Route::get('/{id}', [AdminController::class, 'edit'])->name('edit');   // show admin need to edit page
            Route::put('/{id}', [AdminController::class, 'update'])->name('update');  // update admin method
            Route::delete('/{id}', [AdminController::class, 'destroy'])->name('destroy'); // delete admin
        });

        Route::prefix('/users')->name('user.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');        // all users
            
        });

    });

    
});


// AJAX
Route::prefix('/ajax')->name('ajax.')->group(function () {
    Route::get('/getDistrict/{provinceId}', [LocationController::class, 'getDistrict'])->name('getDistrict');
    Route::get('/getWard/{districtId}', [LocationController::class, 'getWard'])->name('getWard');
});







// FRONTEND
Route::get('/', [PageController::class, 'index'])->name('home');
Route::namespace('Auth')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('postLogin');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    // Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    // Route::post('/register', [RegisterController::class, 'register']);
});








// Get all routes
Route::get('routes', function () {
    $routeCollection = Route::getRoutes();

    echo "<table style='width:100%'>";
    echo "<tr>";
    echo "<td width='10%'><h4>HTTP Method</h4></td>";
    echo "<td width='10%'><h4>Route</h4></td>";
    echo "<td width='10%'><h4>Name</h4></td>";
    echo "<td width='70%'><h4>Corresponding Action</h4></td>";
    echo "</tr>";
    foreach ($routeCollection as $value) {
        echo "<tr>";
        echo "<td>" . $value->methods()[0] . "</td>";
        echo "<td>" . $value->uri() . "</td>";
        echo "<td>" . $value->getName() . "</td>";
        echo "<td>" . $value->getActionName() . "</td>";
        echo "</tr>";
    }
    echo "</table>";
});