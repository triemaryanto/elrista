<?php

use App\Livewire\Admin\Pages\Home;
use App\Livewire\Admin\Pages\Role;
use App\Livewire\Admin\Pages\User;
use Illuminate\Support\Facades\File;
use App\Livewire\Admin\Pages\Profile;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Pages\Permission;
use App\Http\Controllers\HelperController;
use App\Livewire\Admin\Pages\Product\Category;
use App\Livewire\Admin\Pages\Product\Product;
use App\Livewire\Admin\Pages\Setting\Web;
use App\Livewire\Landing\Pages\Home as PagesHome;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('template', function () {
    return File::get(public_path() . '/documentation.html');
});


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', PagesHome::class)->name('front.home');


Route::get('show-picture}', [HelperController::class, 'showPicture'])->name('helper.show-picture');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::group(["prefix" => "admin",], function () {

        Route::get('/dashboard', Home::class)->name('home');
        // Product
        Route::get('/category', Category::class)->name('product.category');
        Route::get('/product', Product::class)->name('product');

        // User
        Route::get('/user', User::class)->name('user');
        Route::get('/role', Role::class)->name('role');
        Route::get('/permission', Permission::class)->name('permission');
        Route::get('/profile', Profile::class)->name('profile');

        // Setting
        Route::get('/web', Web::class)->name('web');
    });
});
