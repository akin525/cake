<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'landingpage'])->name('home');
Route::get('checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('product/{id}', [HomeController::class, 'getproduct']);
Route::get('cakes', [HomeController::class, 'allcake'])->name('cakes');
Route::get('cakedetail/{id}', [HomeController::class, 'cakedetail'])->name('cakedetail');
Route::get('addcart/{id}', [HomeController::class, 'addcart'])->name('addcart');
Route::get('addcart1/{id}', [HomeController::class, 'addcart1'])->name('addcart1');
Route::get('cart', [HomeController::class, 'mycart'])->name('cart');
Route::get('cancelcart/{id}', [CartController::class, 'removefromcart'])->name('cancelcart');
Route::get('clearcart', [CartController::class, 'clearcart'])->name('clearcart');
Route::get('category/{id}', [HomeController::class, 'category'])->name('category');
Route::get('ready', [HomeController::class, 'loadrtb'])->name('ready');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('about', [HomeController::class, 'aboutus'])->name('about');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::get('/cat/{filename}', function ($filename) {
    $path = storage_path('app/cart/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('cat');
Route::get('/cover/{filename}', function ($filename) {
    $path = storage_path('app/cover/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('cover');

Route::get('admin/login', [AuthController::class, 'loginadmin'])->name('admin/login');
Route::post('admin/auth', [AuthController::class, 'authloginadmiin'])->name('admin/auth');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [AuthController::class, 'dashboardadmin'])->name('admin/dashboard');


    Route::get('admin/allproduct', [AuthController::class, 'allproduct'])->name('admin/allproduct');
    Route::get('admin/addproduct', [ProductsController::class, 'addproductindex'])->name('admin/addproduct');
    Route::get('admin/addproduct1', [ProductsController::class, 'addproductindex1'])->name('admin/addproduct1');
    Route::post('admin/addproducts', [ProductsController::class, 'addproduct'])->name('admin/addproducts');
    Route::post('admin/addproducts1', [ProductsController::class, 'addproduct1'])->name('admin/addproducts1');

    Route::get('admin/editproduct/{id}', [ProductsController::class, 'editproduct'])->name('admin/editproduct');
    Route::post('admin/updateproduct', [ProductsController::class, 'updateproduct'])->name('admin/updateproduct');

    Route::get('admin/category', [AuthController::class, 'category'])->name('admin/category');
    Route::post('admin/addcat', [CategoryController::class, 'createcategory'])->name('admin/addcat');

    Route::get('admin/allrtg', [AuthController::class, 'allrtg'])->name('admin/allrtg');
    Route::get('admin/addrtg', [ProductsController::class, 'addproductindex2'])->name('admin/addrtg');

});
    require __DIR__.'/auth.php';
