<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
 
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom'); 
Route::get('/dashboard', [LoginController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('/', [LoginController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'role:developer|Admin|writer'])->name('admin.')->prefix('admin')->group(function (){
    Route::resource('/roles', RoleController::class); 
    Route::resource('/users', UserController::class); 
    Route::resource('/permissions', PermissionController::class); 
    Route::resource('/products', ProductController::class); 
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions'); 
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke'); 
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles'); 
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove'); 
});

Route::get('signout', [LoginController::class, 'signOut'])->name('signout');
