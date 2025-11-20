<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
use App\Livewire\Admin\Profile;

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
    // Admin dashboard
    Route::get('/dashboard', DashboardHome::class)->name('dashboard');
    Route::get('/enrollments', Enrollments::class)->name('enrollments');
    Route::get('/inquiries', Inquiries::class)->name('inquiries');
    Route::get('/gallery', AdminGallery::class)->name('gallery');
    Route::get('/users', Users::class)->name('users');
    Route::get('/settings', Settings::class)->name('settings');

    // Admin profile
    Route::get('/profile', Profile::class)->name('profile');
});

// Admin root redirect: redirect to dashboard if authenticated as admin, otherwise to login
Route::get('/admin', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('login');
})->name('admin.redirect');

// User Routes (For non-admin authenticated users)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', function () {
        // Redirect to admin profile if user is admin, otherwise redirect to home
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.profile');
        }
        return redirect()->route('home');
    })->name('profile');
});

// Fallback for 404 (Must be last)
Route::fallback(NotFound::class);
