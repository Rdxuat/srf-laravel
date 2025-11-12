<?php

use App\Http\Controllers\InvestorAjaxController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});
Route::prefix('investor-relations')->group(function () {
    Route::get('/financial-results', [InvestorController::class, 'financialResultIndex'])->name('financial-result');
    Route::get('/annual-reports', [InvestorController::class, 'annualReportIndex'])->name('annual-report');
    Route::get('/annual-reports-subsidiaries', [InvestorController::class, 'annualReportSubsIndex'])->name('annual-report-subs');
    Route::get('/investor-presentation', [InvestorController::class, 'investorPresentationIndex'])->name('investor-presentation');
    Route::get('/annual-return', [InvestorController::class, 'annualReturnIndex'])->name('annual-return');
    Route::get('/annual-general-meeting', [InvestorController::class, 'agmTranscriptIndex'])->name('annual-general');
    Route::get('/earnings-call', [InvestorController::class, 'earningCallIndex'])->name('earning-call');

    Route::get('/stock-quote', [InvestorController::class, 'stockQuoteIndex'])->name('stock-quote');
    Route::get('/stock-chart', [InvestorController::class, 'stockChartIndex'])->name('stock-chart');
    Route::get('/historical-price', [InvestorController::class, 'historicalPriceIndex'])->name('historical-price');
    Route::get('/investment-calculator', [InvestorController::class, 'investmentCalculatorIndex'])->name('investment-calculator');
    Route::get('/dividend-shares', [InvestorController::class, 'dividendSharesIndex'])->name('dividend-shares');
    Route::get('/listing', [InvestorController::class, 'listingIndex'])->name('listing');

    Route::get('/credit-ratings', [InvestorController::class, 'creditRatingsIndex'])->name('credit-ratings');
    Route::get('/dematerialisation-of-shares', [InvestorController::class, 'dematerialisationIndex'])->name('dematerialisation');
    Route::get('/disclosure-under-regulation-30', [InvestorController::class, 'regulation30Index'])->name('regulation30');
    Route::get('/disclosure-under-regulation-46', [InvestorController::class, 'regulation46Index'])->name('regulation46');
    Route::get('/kyc-forms', [InvestorController::class, 'kycFormsIndex'])->name('kyc-forms');
    Route::get('/nomination-facility', [InvestorController::class, 'nominationIndex'])->name('nomination');
    Route::get('/notices', [InvestorController::class, 'noticesIndex'])->name('notices');
    Route::get('/online-dispute-resolution', [InvestorController::class, 'odrIndex'])->name('odr');
    Route::get('/registrar-and-share-transfer-agent', [InvestorController::class, 'registrarIndex'])->name('registrar');
    Route::get('/scheme-of-arrangements', [InvestorController::class, 'schemeIndex'])->name('scheme');
    Route::get('/secretarial-compliance-report', [InvestorController::class, 'complianceReportIndex'])->name('compliance-report');
    Route::get('/shareholding-pattern', [InvestorController::class, 'shareholdingIndex'])->name('shareholding');
    Route::get('/shareholder-services', [InvestorController::class, 'shareholderServicesIndex'])->name('shareholder-services');
    Route::get('/shareholding-survey-forms', [InvestorController::class, 'surveyFormsIndex'])->name('survey-forms');
    Route::get('/stock-exchange-filings', [InvestorController::class, 'stockFilingsIndex'])->name('stock-filings');
    Route::get('/tds-instructions-on-dividend-distribution', [InvestorController::class, 'tdsInstructionsIndex'])->name('tds-instructions');

    Route::get('/corporate-governance', [InvestorController::class, 'corporateGovernanceIndex'])->name('corporate-governance');
    Route::get('/board-of-directors-and-committees', [InvestorController::class, 'bodIndex'])->name('bod');
    Route::get('/policy', [InvestorController::class, 'policyIndex'])->name('policy');
    Route::get('/corporate-governance-report', [InvestorController::class, 'corporateGovReportIndex'])->name('corporate-gov-report');
    Route::get('/other-disclosures', [InvestorController::class, 'otherDisclosuereIndex'])->name('other-disclosure');


    Route::get('/get-investor-data', [InvestorController::class, 'getInvestorData'])->name('get-investor-data');

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