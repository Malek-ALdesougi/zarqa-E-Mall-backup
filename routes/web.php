<?php

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\adminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\storesController;
use App\Http\Controllers\ProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
// |--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// landing page route --------------------------

Route::get('/index', [storesController::class, 'index'])->name('index');

Route::get('/about', function () {

    return view('/about', array(
        'users' => User::where('roll', 'user')->count(),
        'stores' => Store::all()->count(),
        'products' => Product::all()->count(),
        'orders' => Order::all()->count()
    ));
});

Route::get('/contact', function () {
    if(auth()->user()){
        return view('/contact');
    }else{
        Alert::info('ملاحطة', '!! تسجيل الدخول مطلوب للتواصل معنا ');
        return redirect('/login');
    }
});

Route::post('/userContactMessage/{id}', [UserController::class, 'contactMessage']);



// <<<<<<<<<<<<<<<<<<<-------MAIN ROUTES FOR LOGIN AND REGISTER-------->>>>>>>>>>>>>>>>>>>>>>>>>>

//route to show the register page
Route::get('/register', function () {
    return view('register');
});
Route::post('/register-user', [UserController::class, 'store']);
Route::post('/register-owner', [UserController::class, 'ownerRegister']);

//route to show the login page
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/login-user', [UserController::class, 'login']);

// Logout route
Route::get('/logout', [UserController::class, 'logout']);

// <<<<<<<<<<<<<<<<<<<------- END MAIN ROUTES FOR LOGIN AND REGISTER-------->>>>>>>>>>>>>>>>>>>>>>>






// <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<---------owner page routes---------->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

// i have did this in the controllor because i just can... also this route need to access it from differnt pages 
Route::get('/owner', function () {
    $stoeId = Auth::user()->stores->id;
    $StoreProducts = Product::all()->where('store_id', $stoeId);
    return view('/owner', ['store' => Auth::user()->stores, 'owner' => Auth::user(), 'products' => $StoreProducts]);
})->middleware('can:isOwner');
Route::post('/add-product', [ProductController::class, 'store'])->middleware('can:isOwner');
Route::delete('delete/{id}', [ProductController::class, 'destroy'])->middleware('can:isOwner');

// <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<---------owner page routes---------->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>



//route handel show specific store
Route::get('/store/{id}', [storesController::class, 'show']);

//add to cart route
Route::post('/add-cart/{id}', [CartController::class, 'store']);

//delete cart items route
Route::get('/delete-cart-item/{id}', [CartController::class, 'destroy']);

//delete checkout item route
Route::get('/delete-checkout-item/{id}', [CartController::class, 'deleteItem']);


// checkout route and send the total price with it its much easier !!
Route::get('/checkout', function () {

    if (!auth()->user()) {
        Alert::error('اللإنتقال للدفع يتطلب تسجيل الدخول ');
        return redirect('/login');
    }

    $totalPrice = 0;
    $allProducts = Cart::where('user_id', auth()->user()->id)->get();
    foreach ($allProducts as $product) {
        // dd($product->quantity);
        $original = Product::find($product->product_id);
        $totalPrice = $totalPrice + ($original->price * $product->quantity);
    }
    return view('checkout', ['totalPrice' => $totalPrice]);
});

//place order route
Route::get('/place-order', [OrderController::class, 'store']);
Route::get('/delete-order/{id}', [OrderController::class, 'deleteOrder']);


Route::get('/profile', [Controller::class, 'main'])->middleware('can:isUser');
Route::post('/edit-user-profile/{id}', [Controller::class, 'editProfile'])->middleware('can:isUser');


//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<----------- DASHBOARD ------------>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
Route::middleware('can:isAdmin')->group(function () {


    Route::get('/index-dashboard', [adminController::class, 'index']);

    Route::get('users', [adminController::class, 'show']);
    Route::post('/admin-edit-user/{id}', [adminController::class, 'edit']);
    Route::get('delete-user/{user}', [adminController::class, 'destroy']);

    Route::get('stores', [adminController::class, 'showStores']);
    Route::get('/delete-store/{id}', [adminController::class, 'deleteStore']);
    Route::post('/admin-edit-user/{id}', [adminController::class, 'editStore']);

    Route::get("pendings", [adminController::class, 'showPendingStores']);
    Route::get('/accept-store/{id}', [adminController::class, 'acceptStore']);

    Route::get('/logout-admin', [adminController::class, 'logoutAdmin']);

    Route::get('/messages', [adminController::class, 'userMessages']);
    //delete user message
    Route::get('/delete-user-message/{id}', [adminController::class, 'deleteUserMessage']);
});
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<----------- END DASHBOARD ------------>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
