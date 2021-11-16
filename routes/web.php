<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Users\UsersComponent;
use App\Http\Livewire\Roles\RolesComponent;
use App\Http\Livewire\Permissions\PermissionsComponent;

use App\Http\Livewire\Categories\CategoriesComponent;
use App\Http\Livewire\Tags\TagsComponent;
use App\Http\Livewire\Posts\PostsComponent;

use App\Http\Livewire\Pages\PagesComponent;
use App\Http\Livewire\Menus\MenusComponent;
use App\Http\Livewire\Products\ProductsComponent;
use App\Http\Livewire\Albums\AlbumsComponent;

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
    
    Route::prefix('authentication')->group(function(){
        Route::get('/users', UsersComponent::class)->name('users');
        Route::get('/roles', RolesComponent::class)->name('roles');
        Route::get('/permissions', PermissionsComponent::class)->name('permissions');
    });

    Route::prefix('news')->group(function(){
        Route::get('/categories', CategoriesComponent::class)->name('categories');
        Route::get('/tags', TagsComponent::class)->name('tags');
        Route::get('/posts', PostsComponent::class)->name('posts');
    });

    Route::get('/pages', PagesComponent::class)->name('pages');
    Route::get('/menus', MenusComponent::class)->name('menus');
    Route::get('/products', ProductsComponent::class)->name('products');
    Route::get('/albums', AlbumsComponent::class)->name('albums');
});
