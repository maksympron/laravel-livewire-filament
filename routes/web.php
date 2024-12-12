<?php

use App\Livewire\Content;
use App\Livewire\Contact;

use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', Content::class)->name('home');

Route::get('/contact', Contact::class)->name('contact');
Route::get('/dashboard', Dashboard::class)->name('dashboard');

