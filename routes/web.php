<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Home;
use App\Livewire\Pages\About;
use App\Livewire\Pages\Contact;
use App\Livewire\Pages\Admission;
use App\Livewire\Pages\Register;
use App\Livewire\Pages\Gallery;
use App\Livewire\Pages\Anthem;
use App\Livewire\Pages\NotFound;
use App\Livewire\Admin\DashboardHome;
use App\Livewire\Admin\Enrollments;
use App\Livewire\Admin\Inquiries;
use App\Livewire\Admin\AdminGallery;
use App\Livewire\Admin\Users;
use App\Livewire\Admin\Settings;

// Authentication Routes (Must be registered before other routes)
require __DIR__ . '/auth.php';

// Public Routes
Route::get('/', Home::class)->name('home');
Route::get('/about', About::class)->name('about');
Route::get('/admission', Admission::class)->name('admission');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/enrol', Register::class)->name('enrol');
Route::get('/gallery', Gallery::class)->name('gallery');
Route::get('/anthem', Anthem::class)->name('anthem');

// Admin Routes (Protected by auth + admin middleware)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', DashboardHome::class)->name('dashboard');
    Route::get('/enrollments', Enrollments::class)->name('enrollments');
    Route::get('/inquiries', Inquiries::class)->name('inquiries');
    Route::get('/gallery', AdminGallery::class)->name('gallery');
    Route::get('/users', Users::class)->name('users');
    Route::get('/settings', Settings::class)->name('settings');
});

// User Routes (For non-admin authenticated users)
Route::middleware(['auth', 'verified'])->group(function () {
    // User dashboard — render admin dashboard for admin users (middleware protects it)
    Route::get('/dashboard', DashboardHome::class)
        ->middleware(['auth', 'admin'])
        ->name('dashboard');

    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
});

// Fallback for 404 (Must be last)
Route::fallback(NotFound::class);
