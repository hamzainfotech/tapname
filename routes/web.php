<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CardCrudController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MarketingController;
use Illuminate\Support\Facades\Route;

$mainDomain = env('APP_DOMAIN', 'tap.name');
$accountDomain = env('ACCOUNT_DOMAIN', 'account.tap.name');

// Main marketing site + public NFC profile pages
Route::domain($mainDomain)->group(function () {
    Route::get('/', [MarketingController::class, 'index'])->name('home');

    Route::get('/{code}', [CardController::class, 'show'])
        ->where('code', '[a-z0-9]{6}')
        ->name('card.show');

    Route::get('/{code}/vcard', [CardController::class, 'vcard'])
        ->where('code', '[a-z0-9]{6}')
        ->name('card.vcard');
});

// Account subdomain (authenticated users customize their cards)
Route::domain($accountDomain)->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/cards/create', [CardCrudController::class, 'create'])->name('cards.create');
        Route::post('/cards', [CardCrudController::class, 'store'])->name('cards.store');
        Route::get('/cards/{card}/edit', [CardCrudController::class, 'edit'])->name('cards.edit');
        Route::put('/cards/{card}', [CardCrudController::class, 'update'])->name('cards.update');
        Route::delete('/cards/{card}', [CardCrudController::class, 'destroy'])->name('cards.destroy');
    });
});
