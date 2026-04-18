<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ============= SITEMAP ROUTE =============
Route::get('/sitemap.xml', function () {
    $sitemap = Sitemap::create();
    
    $pages = [
        '/' => ['priority' => '1.0', 'freq' => 'daily'],
        '/home' => ['priority' => '0.9', 'freq' => 'daily'],
        '/services' => ['priority' => '0.9', 'freq' => 'weekly'],
        '/House_cleaning' => ['priority' => '0.8', 'freq' => 'weekly'],
        '/Office_cleaning' => ['priority' => '0.8', 'freq' => 'weekly'],
        '/Gym_cleaning' => ['priority' => '0.8', 'freq' => 'weekly'],
        '/gallery' => ['priority' => '0.7', 'freq' => 'monthly'],
        '/contact' => ['priority' => '0.8', 'freq' => 'monthly'],
        '/about' => ['priority' => '0.8', 'freq' => 'monthly'],
    ];
    
    foreach ($pages as $url => $config) {
        $sitemap->add(Url::create($url)
            ->setLastModificationDate(now())
            ->setChangeFrequency($config['freq'])
            ->setPriority($config['priority']));
    }
    
    return $sitemap->toResponse(request());
});

// ============= LANGUAGE ROUTE =============
Route::get('lang/{lang}', [App\Http\Controllers\zenContactController::class, 'lang'])->name('lang.switch');

// ============= WEBSITE ROUTES =============
Route::group(['middleware' => 'lang'], function() {
    Route::get('/', function () {
        return view('Home');
    })->name('home');

    Route::get('/home', function () {
        return view('Home');
    })->name('home.alt');

    Route::get('/services', function () {
        return view('Services');
    })->name('services');
    
    Route::get('/House_cleaning', function () {
        return view('HouseCleaning');
    })->name('house.cleaning');
    
    Route::get('/Office_cleaning', function () {
        return view('OfficeCleaning');
    })->name('office.cleaning');
    
    Route::get('/Gym_cleaning', function () {
        return view('GymCleaning');
    })->name('gym.cleaning');
   
    Route::get('/gallery', function () {
        return view('Gallery');
    })->name('gallery');
  
    Route::get('/contact', function () {
        return view('Contact');
    })->name('contact.page');
    
    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::post('/contact', [App\Http\Controllers\zenContactController::class, 'contact'])->name('contact.submit');
});

// ============= INVOICE SYSTEM ROUTES (ADMIN SECRET) =============
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [InvoiceController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/invoices/store', [InvoiceController::class, 'store'])->name('invoices.store');
    Route::get('/invoices/search', [InvoiceController::class, 'search'])->name('invoices.search');
    Route::get('/invoices/{id}', [InvoiceController::class, 'show'])->name('invoices.show');
    Route::get('/invoices/{id}/pdf', [InvoiceController::class, 'downloadPDF'])->name('invoices.pdf');
});
