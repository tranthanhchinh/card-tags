<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['checklogin'])->group(function () {
    Route::get('/', [MemberController::class, 'index'])->name('index');
    Route::get('/logout', [MemberController::class, 'logout'])->name('logout');
    Route::get('/account', [MemberController::class, 'account'])->name('account');
    Route::post('/account', [MemberController::class, 'postAccount'])->name('postaccount');
    Route::get('/card', [CardController::class, 'index'])->name('card');
    Route::post('/card', [CardController::class, 'update'])->name('putcard');
    Route::get('/tags', [CardController::class, 'tagsMember'])->name('tags');
    Route::post('/tags', [CardController::class, 'updateTagsMember'])->name('posttags');
    Route::get('/qrcode', [CardController::class, 'qrcode'])->name('qrcode');
});
Route::get('/register', [MemberController::class, 'register'])->name('getregister');
Route::post('/register', [MemberController::class, 'postRegister'])->name('postregister');
Route::get('/login', [MemberController::class, 'login'])->name('login');
Route::post('/login', [MemberController::class, 'postLogin'])->name('postLogin');
Route::get('/viewer/{slug}', [CardController::class, 'viewCard'])->name('viewer');
Route::get('/vcard/{slug}', [CardController::class, 'vcardfile'])->name('vcardfile');

