<?php

use App\Http\Controllers\PressReleaseController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\InvestorAjaxController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\InvestorUploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/press-releases', [PressReleaseController::class, 'index'])->name('press-releases');
Route::get('/in-the-news', [NewsController::class, 'index'])->name('in-the-news');
Route::get('/news/{slug}', [NewsController::class, 'news'])->name('news');

Route::get('/investors/upload', [InvestorUploadController::class, 'index']);
Route::post('/investors/upload', [InvestorUploadController::class, 'upload'])->name('investors.upload');

Route::prefix('investor-relations')->group(function () {
    Route::get('/financial-results', [InvestorController::class, 'render'])->name('financial-result');
    Route::get('/annual-reports', [InvestorController::class, 'render'])->name('annual-report');
    Route::get('/annual-reports-subsidiaries', [InvestorController::class, 'render'])->name('annual-report-subs');
    Route::get('/investor-presentation', [InvestorController::class, 'render'])->name('investor-presentation');
    Route::get('/annual-return', [InvestorController::class, 'render'])->name('annual-return');
    Route::get('/annual-general-meeting', [InvestorController::class, 'render'])->name('annual-general');
    Route::get('/earnings-call', [InvestorController::class, 'render'])->name('earning-call');

    Route::get('/stock-quote', [InvestorController::class, 'render'])->name('stock-quote');
    Route::get('/stock-chart', [InvestorController::class, 'render'])->name('stock-chart');
    Route::get('/historical-price', [InvestorController::class, 'render'])->name('historical-price');
    Route::get('/investment-calculator', [InvestorController::class, 'render'])->name('investment-calculator');
    Route::get('/dividend-and-shares', [InvestorController::class, 'render'])->name('dividend-shares');
    Route::get('/listing', [InvestorController::class, 'render'])->name('listing');

    Route::get('/credit-ratings', [InvestorController::class, 'render'])->name('credit-ratings');
    Route::get('/dematerialisation-of-shares', [InvestorController::class, 'render'])->name('dematerialisation');
    Route::get('/disclosure-under-regulation-30', [InvestorController::class, 'render'])->name('regulation30');
    Route::get('/disclosure-under-regulation-46', [InvestorController::class, 'render'])->name('regulation46');
    Route::get('/investor-meet', [InvestorController::class, 'render'])->name('investor-meet');
    Route::get('/kyc-forms', [InvestorController::class, 'render'])->name('kyc-forms');
    Route::get('/nomination-facility', [InvestorController::class, 'render'])->name('nomination');
    Route::get('/notices', [InvestorController::class, 'render'])->name('notices');
    Route::get('/online-dispute-resolution', [InvestorController::class, 'render'])->name('odr');
    Route::get('/registrar-and-share-transfer-agent', [InvestorController::class, 'render'])->name('registrar');
    Route::get('/scheme-of-arrangements', [InvestorController::class, 'render'])->name('scheme');
    Route::get('/secretarial-compliance-report', [InvestorController::class, 'render'])->name('compliance-report');
    Route::get('/shareholding-pattern', [InvestorController::class, 'render'])->name('shareholding');
    Route::get('/shareholder-services', [InvestorController::class, 'render'])->name('shareholder-services');
    Route::get('/shareholding-survey-forms', [InvestorController::class, 'render'])->name('survey-forms');
    Route::get('/share-transfer-system', [InvestorController::class, 'render'])->name('share-transfer-system');
    Route::get('/stock-exchange-filings', [InvestorController::class, 'render'])->name('stock-filings');
    Route::get('/tds-instructions-on-dividend-distribution', [InvestorController::class, 'render'])->name('tds-instructions');

    Route::get('/corporate-governance', [InvestorController::class, 'render'])->name('corporate-governance');
    Route::get('/board-of-directors-and-committees', [InvestorController::class, 'render'])->name('bod');
    Route::get('/policy', [InvestorController::class, 'render'])->name('policy');
    Route::get('/corporate-governance-report', [InvestorController::class, 'render'])->name('corporate-gov-report');
    Route::get('/other-disclosures', [InvestorController::class, 'render'])->name('other-disclosure');


    Route::get('/get-investor-data', [InvestorController::class, 'getInvestorData'])->name('get-investor-data');
    Route::post('/search-unclaimed-dividend', [InvestorUploadController::class, 'search'])->name('search.unclaimed');

});
Route::get('/aos', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::middleware('guest')->prefix('aos')->group(function () {
    Route::get('/login', [AuthController::class, 'index_login'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

// Protected admin routes
Route::middleware('auth')->prefix('aos')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/account_settings', [AuthController::class, 'accountSettings'])->name('accountSettings');
    Route::post('/change_password', [AuthController::class, 'changePassword'])->name('changePassword');
    Route::get('/test', [AuthController::class, 'test'])->middleware('role:superadmin')->name('users');
    Route::get('/loginHistory', [LogController::class, 'loginHistory'])->name('loginHistory');
    Route::get('/logs', [LogController::class, 'index'])->name('logs');
    Route::get('/logs/download', [LogController::class, 'download'])->name('logs.download');
    Route::delete('/logs/delete', [LogController::class, 'delete'])->name('logs.delete');
});