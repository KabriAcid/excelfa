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

// Public Routes
Route::get('/', Home::class)->name('home');
Route::get('/about', About::class)->name('about');
Route::get('/admission', Admission::class)->name('admission');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/register', Register::class)->name('register');
Route::get('/gallery', Gallery::class)->name('gallery');
Route::get('/anthem', Anthem::class)->name('anthem');

// Fallback for 404
Route::fallback(NotFound::class);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
