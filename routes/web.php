<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\CategoryController;
use Illuminate\Support\Facades\Mail;
use App\Mail\ModelVerificationMail;
use App\Http\Controllers\Auth\OtpVerificationController;
use App\Http\Controllers\Dashboard\ProductPrintController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProductQuoteController;
use App\Http\Controllers\Frontend\ContactController;

use App\Http\Controllers\Frontend\HomeController;

Route::resource('products', ProductController::class);
Route::get('/products/{id}/detail', [ProductController::class, 'showDetail'])
    ->name('products.detail');

Route::delete('/product/color/{id}', [ProductController::class, 'deleteColor'])->name('products.color.delete');
Route::delete('/product/image/{id}', [ProductController::class, 'deleteImage'])->name('products.image.delete');


// Delete an entire tab
Route::delete('/products/tab/{id}', [ProductController::class, 'deleteTab'])
    ->name('products.tab.delete');

// Delete one row inside a tab
Route::delete('/products/tab-row/{id}', [ProductController::class, 'deleteTabRow'])
    ->name('products.tab.row.delete');


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/Dashboard', function () {
    return redirect()->route('login');
});
Route::get('/home', [DashboardController::class, 'index'])->name('home');

Route::resource('users', UserController::class);


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('roles', RoleController::class);
});

Route::resource('categories', CategoryController::class);
Route::get('/verify-otp', [OtpVerificationController::class, 'showForm'])
    ->name('verification.email')
    ->withoutMiddleware('auth');

Route::post('/verify-otp', [OtpVerificationController::class, 'verify'])
    ->name('verify.otp')
    ->withoutMiddleware('auth');

Route::get('/resend-otp', function () {
    $user = auth()->user();
    $otp = rand(10000, 99999);

    // Save OTP temporarily in session
    session(['otp' => $otp]);

    // Send email
    Mail::to($user->email)->send(new ModelVerificationMail($user->name, $otp));

    return back()->with('success', 'A new OTP has been sent to your email.');
})->name('resend.otp');


Route::get('/product/quote/{id}', [ProductQuoteController::class, 'show'])->name('product.quote.show');
Route::post('/product/quote/{id}', [ProductQuoteController::class, 'submit'])->name('product.quote.submit');


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');
Route::post('/products/{id}/special-offer', [ProductController::class, 'specialOfferUpdate']);
Route::post('/products/{id}/popular-toggle', [ProductController::class, 'togglePopular'])
    ->name('products.popular.toggle');

Route::get('/About', [HomeController::class, 'about'])->name('about');

Route::get('/Terms', [HomeController::class, 'terms'])->name('terms');

Route::get('/product', [HomeController::class, 'product'])->name('product');
Route::get('/special-offers', [HomeController::class, 'specialOffere'])
    ->name('special.offers');


// FRONTEND
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// DASHBOARD / ADMIN
Route::get('/dashboard/contact', [ContactController::class, 'index'])->name('dashboard.contact.index');


Route::get(
    '/product/{id}/download-images',
    [HomeController::class, 'downloadAllImages']
)->name('product.images.download.all');
Route::get('/image/download/{id}', [HomeController::class, 'downloadSingleImage'])
    ->name('image.download');


Route::post('/freight/submit', [HomeController::class, 'submitEstimate'])->name('freight.submit');


Route::get('/template/color/{color}/download', [HomeController::class, 'downloadSingleTemplate'])
    ->name('template.single');

Route::get('/template/product/{product}/download-all', [HomeController::class, 'downloadAllTemplates'])
    ->name('template.all');

Route::get('/template/product/{product}/bw', [HomeController::class, 'downloadBwTemplate'])
    ->name('template.bw');

    
require __DIR__ . '/auth.php';
