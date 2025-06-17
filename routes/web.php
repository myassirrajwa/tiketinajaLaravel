<?php

use App\Models\User;
use App\Mail\testEmail;
use App\Jobs\BanyakEventJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\showController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Middleware\AdminOnly;
use App\Models\checkOut;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Event;

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
    return redirect()->route('home');
});

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
 
Route::get('/registrasi', [registrasiController::class, 'index'])->name('registrasi');
Route::post('/registrasi', [RegistrasiController::class, 'store']);


Route::middleware(["auth"])->group(function(){
    Route::get('admin',function(){
        
        return redirect(route("admin"));
    });
    Route::resource('post',postController::class);
    Route::get('/home', [LandingController::class, 'index'])->name('home');
    Route::post('/home', [LandingController::class, 'store']);

    Route::get('/checkout/{id}', [CheckoutController::class, 'showCheckoutForm'])->name('checkout.form');
    Route::post('/checkout/{event}', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkOut');
    Route::get('/checkout/qrcode/{id}', [CheckoutController::class, 'showQrCode'])->name('checkout.qrcode');

    Route::get('/admin', [AdminController::class, 'index'])->middleware(["auth", AdminOnly::class])->name('admin');
    Route::get('/admin/event', [AdminController::class, 'event_index'])->name('admin.event');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/create', [AdminController::class, 'store'])->name('admin.add');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');


    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');   
});
Route::post('logout',[LoginController::class,'destroy'])->name('logout')->middleware("auth");

Route::get('test', function() {
    BanyakEventJob::dispatch();
    // User::factory(100)->create();
    info("test jobs");
    return "Hello";
});


Route::get('/kirimEmail',function(){
    Mail::to('rinfaabdullah@gmail.com')->send(new testEmail());
    return 'succes';
});



// Route::get('/email/verify', function () {
//     return view("auth.verify-email");
// })->middleware('auth')->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();

//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
 
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');