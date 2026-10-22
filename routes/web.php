<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardAnalyticsController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CardCrudController;
use App\Http\Controllers\CardLeadController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CardController as AdminCardController;
use App\Http\Controllers\Admin\AdminController as AdminAdminController;
use App\Http\Controllers\Admin\AnalyticsController as AdminAnalyticsController;
use App\Http\Controllers\Admin\HomepageSectionController as AdminHomepageSectionController;
use App\Http\Controllers\Admin\SiteSettingController as AdminSiteSettingController;
use App\Http\Controllers\Admin\SystemController as AdminSystemController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\LeadController as AdminLeadController;
use Illuminate\Support\Facades\Route;

$mainDomain = env('APP_DOMAIN', 'tap.name');
$accountDomain = env('ACCOUNT_DOMAIN', 'account.tap.name');
$adminDomain = env('ADMIN_DOMAIN', 'admin.tap.name');

// Main marketing site + public NFC profile pages
Route::domain($mainDomain)->group(function () {
    Route::get('/', [MarketingController::class, 'index'])->name('home');

    Route::get('/{code}', [CardController::class, 'show'])
        ->where('code', '[a-z0-9]{6}')
        ->name('card.show');

    Route::post('/{code}/lead', [CardController::class, 'storeLead'])
        ->where('code', '[a-z0-9]{6}')
        ->name('card.lead');

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
        Route::get('/cards/{card}/leads', [CardLeadController::class, 'index'])->name('cards.leads');
        Route::get('/cards/{card}/analytics', [CardAnalyticsController::class, 'show'])->name('cards.analytics');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    });
});
// Admin subdomain
Route::domain($adminDomain)->group(function () {
    Route::middleware('admin.guest')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    });

    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('admin')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        Route::resource('users', AdminUserController::class)->except(['create', 'store', 'show'])->names('admin.users');
        Route::resource('cards', AdminCardController::class)->except(['create', 'store', 'show'])->names('admin.cards');
        Route::resource('admins', AdminAdminController::class)->except(['show'])->names('admin.admins');
        Route::get('leads', [AdminLeadController::class, 'index'])->name('admin.leads.index');
        Route::get('analytics', [AdminAnalyticsController::class, 'index'])->name('admin.analytics.index');

        Route::get('homepage', [AdminHomepageSectionController::class, 'index'])->name('admin.homepage.index');
        Route::get('homepage/{section}/edit', [AdminHomepageSectionController::class, 'edit'])->name('admin.homepage.edit');
        Route::put('homepage/{section}', [AdminHomepageSectionController::class, 'update'])->name('admin.homepage.update');

        Route::get('settings', [AdminSiteSettingController::class, 'index'])->name('admin.settings.index');
        Route::put('settings', [AdminSiteSettingController::class, 'update'])->name('admin.settings.update');
        Route::get('system', [AdminSystemController::class, 'index'])->name('admin.system.index');
        Route::post('system/clear-cache', [AdminSystemController::class, 'clearCache'])->name('admin.system.clear-cache');
    });
});
