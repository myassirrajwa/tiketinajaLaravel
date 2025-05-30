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
use App\Http\Controllers\RegistrasiController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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


Route::middleware([])->group(function(){
    Route::get('admin',function(){
        $user = auth()->user(); 
        return view('auth.admin',compact('user'));
    })->name('admin')->middleware('auth');
    Route::resource('post',postController::class);
    
    Route::get('/pamerkan',[EventController::class, 'index'])->name('event');
    Route::post('/pamerkan',[EventController::class, 'store'])->name('event.store');
    
    Route::get('/home', [LandingController::class, 'index'])->name('home');
    Route::post('/home', [LandingController::class, 'store']);
    Route::get('/show/{slug}', [showController::class, 'show'])->name('auth.show');
    
    Route::get('/admin',[AdminController::class,'index'])->name('admin');
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