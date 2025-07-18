<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WinController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotifyController;
use App\Http\Controllers\MethodController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\FeedbackController;


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
// Route::get('/', [Controller::class, 'layout'])->name('template');
Route::get('/locale/{locale}', [Controller::class, 'setLang'])->name('locale');
Route::get('/', [Controller::class, 'welcome'])->name('welcome');
Route::get('/{message}/success', [Controller::class, 'success'])->name('success');

Route::match(['GET', 'POST'], '/notify/{ref}/cinetpay', [NotifyController::class, 'cinetpay'])->name('notify.cinetpay');
Route::match(['GET', 'POST'], '/notify/{ref}/flutterwave', [NotifyController::class, 'flutterwave'])->name('notify.flutterwave');

// Route::get('/register/{code}', [Controller::class, 'registerLink'])->name('register.link');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');
    
    Route::get('/autoupdate/users', [UserController::class, 'selectAll'])->name('users.autoupdate');
    Route::get('/enabled/{id}/users', [UserController::class, 'enable'])->name('users.enable');
    Route::get('/remove/{id}/users', [UserController::class, 'remove'])->name('users.remove');
    Route::get('/banks/country', [CountryController::class, 'banks'])->name('countries.banks');
    
    Route::get('/wallet', [Controller::class, 'wallet'])->name('wallet');
    Route::get('/network', [Controller::class, 'network'])->name('network');
    Route::get('/aboutus', [Controller::class, 'aboutus'])->name('aboutus');
    Route::get('/faqs', [Controller::class, 'faqs'])->name('faqs');
    Route::get('/privacy', [Controller::class, 'privacy'])->name('privacy');
    Route::get('/feedback', [Controller::class, 'feedback'])->name('feedback');
    Route::post('/confirmation/code', [WithdrawController::class, 'sendmail'])->name('sendmail');

    Route::get('/home', [Controller::class, 'home'])->name('home');
    Route::get('/wallet', [Controller::class, 'wallet'])->name('wallet');
    Route::get('/chats', [Controller::class, 'chats'])->name('chats');
    Route::get('/children', [Controller::class, 'children'])->name('children');
    Route::get('/language', [Controller::class, 'language'])->name('language');

    Route::resource('withdraws', WithdrawController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('methods', MethodController::class);
    Route::resource('wins', WinController::class);
    Route::resource('users', UserController::class);
    Route::resource('feedbacks', FeedbackController::class);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
