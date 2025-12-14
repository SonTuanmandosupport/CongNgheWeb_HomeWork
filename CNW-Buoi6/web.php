<?php

use App\Http\Controllers\PageController;

Route::get('/', [PageController::Class,'showHomePage']);
Route::get('/about', [PageController::class, 'showHomepage']);