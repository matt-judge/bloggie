<?php

use Illuminate\Support\Facades\Route;

Auth::routes([
    'register'  => false,
    'reset'     => false,
    'verify'    => false,
]);


/** Website Routes */
Route::get('/', function () {
    return view('website.index');
})->name('home');

Route::get('/blog', [\App\Http\Controllers\Website\BlogController::class, 'index']);
Route::get('/blog/{blog:slug}', [\App\Http\Controllers\Website\BlogController::class, 'show']);

Route::get('/what-our-customers-say-about-us', [\App\Http\Controllers\Website\TestimonialController::class, 'index']);

/** Admin Routes */
Route::group([
    'as'         => 'admin.',
    'middleware' => 'auth',
    'prefix'     => 'admin',
], function () {
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('index');
    Route::resource('blog', \App\Http\Controllers\Admin\BlogController::class)->only([
        'create',
        'edit',
        'index',
        'update',
        'store'
    ]);

    Route::resource('testimonial', \App\Http\Controllers\Admin\TestimonialController::class)->only([
        'create',
        'edit',
        'index',
        'update',
        'store'
    ]);
});
