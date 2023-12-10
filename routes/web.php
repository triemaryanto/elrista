<?php

use App\Livewire\Admin\Pages\Home;
use App\Livewire\Admin\Pages\Role;
use App\Livewire\Admin\Pages\User;
use App\Livewire\Landing\Pages\Shop;
use Illuminate\Support\Facades\File;
use App\Livewire\Admin\Pages\Profile;
use Illuminate\Support\Facades\Route;
use App\Livewire\Landing\Pages\Detail;
use App\Livewire\Admin\Pages\Permission;
use App\Livewire\Admin\Pages\Setting\Web;
use App\Http\Controllers\HelperController;
use App\Livewire\Admin\Pages\LookBook;
use App\Livewire\Admin\Pages\Order\OrderUser;
use App\Livewire\Admin\Pages\Product\Product;
use App\Livewire\Admin\Pages\Product\Category;
use App\Livewire\Admin\Pages\Setting\Banner\BannerController;
use App\Livewire\Landing\Pages\Blog;
use App\Livewire\Landing\Pages\Cart\Cart;
use App\Livewire\Landing\Pages\Cart\Checkout;
use App\Livewire\Landing\Pages\Cart\DetailOrder;
use App\Livewire\Landing\Pages\Cart\ListOrder;
use App\Livewire\Landing\Pages\Detailblog;
use App\Livewire\Landing\Pages\Home as PagesHome;
use App\Livewire\Landing\Pages\Wishlist\Wishlist;

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
Route::get('/detail/{slug}', Detail::class)->name('detail');
Route::get('/shop', Shop::class)->name('shop');
Route::get('/wishlist', Wishlist::class)->name('wishlist');
Route::get('/blog', Blog::class)->name('blog');
Route::get('/blog/{slug}', Detailblog::class)->name('detailblog');
Route::get('/cart', Cart::class)->name('cart');

Route::get('show-picture}', [HelperController::class, 'showPicture'])->name('helper.show-picture');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/listorder', ListOrder::class)->name('listorder');
    Route::get('/detailorder/{idnya}', DetailOrder::class)->name('detailorder');
    Route::get('/checkout/{idnya}', Checkout::class)->name('checkout');

    Route::group(["prefix" => "admin", 'middleware' => 'is_user'], function () {

        Route::get('/dashboard', Home::class)->name('home');

        // Order User
        Route::get('/order', OrderUser::class)->name('user.order');

        // Product
        Route::get('/category', Category::class)->name('product.category');
        Route::get('/product', Product::class)->name('product');
        Route::get('/lookbook', LookBook::class)->name('lookbook');

        // User
        Route::get('/user', User::class)->name('user');
        Route::get('/role', Role::class)->name('role');
        Route::get('/permission', Permission::class)->name('permission');
        Route::get('/profile', Profile::class)->name('profile');

        // Setting
        Route::get('/web', Web::class)->name('web');
        Route::get('/banner', BannerController::class)->name('banner');
    });
});

Route::post('payments/midtrans-notification', [PaymentCallbackController::class, 'receive']);
