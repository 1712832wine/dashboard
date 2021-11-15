<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Users\UsersComponent;
use App\Http\Livewire\Roles\RolesComponent;
use App\Http\Livewire\Permissions\PermissionsComponent;
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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/authentication/users', UsersComponent::class)->name('users');
    Route::get('/authentication/roles', RolesComponent::class)->name('roles');
    Route::get('/authentication/permissions', PermissionsComponent::class)->name('permissions');
});
