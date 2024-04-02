<?php

use App\Http\Controllers\admin\AlertController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\FqController;
use App\Http\Controllers\admin\OrdersController;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\admin\SetiingsController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\VariationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
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

Route::post('logsp', [HomeController::class, 'logincheck'])->name('logsp');

Route::get('/', [HomeController::class, 'landingpage'])->name('home');
Route::get('home', [HomeController::class, 'landingpage'])->name('home');
Route::get('checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('product/{id}', [HomeController::class, 'getproduct']);
Route::get('cakes', [HomeController::class, 'allcake'])->name('cakes');
Route::get('cakedetail/{id}', [HomeController::class, 'cakedetail'])->name('cakedetail');
Route::get('addcart/{id}', [HomeController::class, 'addcart'])->name('addcart');
Route::get('cart', [HomeController::class, 'mycart'])->name('cart');
Route::get('cancelcart/{id}', [CartController::class, 'removefromcart'])->name('cancelcart');
Route::get('clearcart', [CartController::class, 'clearcart'])->name('clearcart');
Route::get('category/{id}', [HomeController::class, 'category'])->name('category');
Route::get('ready', [HomeController::class, 'loadrtb'])->name('ready');
Route::get('getlayer/{id}', [HomeController::class, 'getlayer'])->name('getlayer');
Route::get('getsize/{id}', [HomeController::class, 'getsize'])->name('getsize');
Route::post('addcart1', [HomeController::class, 'addcart'])->name('addcart1');
Route::get('cart', [HomeController::class, 'mycart'])->name('cart');
Route::post('check', [OrderController::class, 'postorder'])->name('check');
Route::get('tran', [OrderController::class, 'confirmpayment'])->name('tran');
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
    Route::get('admin/editproduct1/{id}', [ProductsController::class, 'editproduct1'])->name('admin/editproduct1');
    Route::post('admin/updateproduct', [ProductsController::class, 'updateproduct'])->name('admin/updateproduct');
    Route::post('admin/updateproduct1', [ProductsController::class, 'updateproduct1'])->name('admin/updateproduct1');

    Route::get('admin/category', [AuthController::class, 'category'])->name('admin/category');
    Route::post('admin/addcat', [CategoryController::class, 'createcategory'])->name('admin/addcat');

    Route::get('admin/allrtg', [AuthController::class, 'allrtg'])->name('admin/allrtg');
    Route::get('admin/addrtg', [ProductsController::class, 'addproductindex2'])->name('admin/addrtg');

    Route::get('admin/orders', [OrdersController::class, 'loadorders'])->name('admin/orders');
    Route::get('admin/vieworder/{id}', [OrdersController::class, 'vieworders'])->name('admin/vieworder');

    Route::get('admin/customers', [UsersController::class, 'allcustomer'])->name('admin/customers');
    Route::get('admin/edituser/{id}', [UsersController::class, 'editcustomer'])->name('admin/edituser');
    Route::get('admin/searchuser', [UsersController::class, 'searchuser'])->name('admin/searchuser');
    Route::post('admin/search', [UsersController::class, 'searchresult'])->name('admin/search');

    Route::get('admin/payments', [PaymentController::class, 'allpayment'])->name('admin/payments');
    Route::get('admin/viewpay/{id}', [PaymentController::class, 'viewpayment']);


    Route::get('/transactions', [AuthController::class, 'getTransactions']);
    Route::get('/transactions1', [AuthController::class, 'getTransactions1']);

    Route::get('admin/settings', [SetiingsController::class, 'loadsettings'])->name('admin/settings');
    Route::post('admin/savepage', [SetiingsController::class, 'changepage'])->name('admin/savepage');

    Route::get('admin/size', [VariationController::class, 'sizeindex'])->name('admin/size');
    Route::post('admin/psize', [VariationController::class, 'createsize'])->name('admin/psize');
    Route::post('admin/editsize', [VariationController::class, 'editsizes'])->name('admin/editsize');

    Route::get('admin/layers', [VariationController::class, 'layersindex'])->name('admin/layers');
    Route::post('admin/players', [VariationController::class, 'createlayers'])->name('admin/players');
    Route::post('admin/editlayer', [VariationController::class, 'editlayers'])->name('admin/editlayer');

    Route::get('admin/flavour', [VariationController::class, 'flavourindex'])->name('admin/flavour');
    Route::post('admin/pflavour', [VariationController::class, 'createflavour'])->name('admin/pflavour');
    Route::post('admin/editflavour', [VariationController::class, 'editflavour'])->name('admin/editflavour');

    Route::get('admin/color', [VariationController::class, 'indexcolor'])->name('admin/color');
    Route::post('admin/colour', [VariationController::class, 'createcolor'])->name('admin/colour');


    Route::get('admin/addfaq', [FqController::class, 'indexfq'])->name('admin/addfaq');
    Route::post('admin/addfa', [FqController::class, 'createfq'])->name('admin/addfa');

    Route::get('admin/gateway', [SetiingsController::class, 'gatewayindex'])->name('admin/gateway');
    Route::post('admin/gat', [SetiingsController::class, 'updategateway'])->name('admin/gat');

    Route::get('admin/about', [SetiingsController::class, 'aboutindex'])->name('admin/about');
    Route::post('admin/ab', [SetiingsController::class, 'updateabout'])->name('admin/ab');


    Route::get('admin/alert', [AlertController::class, 'loadindex'])->name('admin/alert');
    Route::post('admin/alertp', [AlertController::class, 'updatealert'])->name('admin/alertp');

});
    require __DIR__.'/auth.php';


