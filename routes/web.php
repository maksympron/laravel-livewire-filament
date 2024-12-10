<?php

use App\Livewire\Content;
use App\Livewire\Contact;

use Illuminate\Support\Facades\Route;

Route::get('/', Content::class)->name('home');

Route::get('/contact', Contact::class)->name('contact');
