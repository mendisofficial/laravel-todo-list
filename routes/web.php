<?php

use Illuminate\Support\Facades\Route;

// This route displays the welcome page with a view
Route::get('/', function () {
    return view('welcome');
});

// This route returns a simple string response
Route::get('/hello', function () {
    return 'Hello, World!';
})->name('hello');

// This route redirects to the hello route
Route::get('hallo', function () {
    return redirect()->route('hello');
});

// This is how dynamic route parameters work
Route::get('greet/{name}', function ($name) {
    return 'Hello, ' . $name . '!';
});

// This is how fallback routes work
Route::fallback(function () {
    return "I'm the fallback route";
});

// To view all the routes
// php artisan route:list
