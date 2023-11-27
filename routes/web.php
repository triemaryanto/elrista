<?php

use App\Livewire\Admin\Page\Permission;
use App\Livewire\Admin\Page\Role;
use App\Livewire\Admin\Page\User;
use App\Livewire\Admin\Pages\Home;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(["prefix" => "dashboard"],function () {
        Route::get('/dashboard', Home::class)->name('home');
        Route::get('/user', User::class)->name('user');
        Route::get('/role', Role::class)->name('role');
        Route::get('/permission', Permission::class)->name('permission');
});
