
<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\RoomCheckController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::resource('roomcheck', RoomCheckController::class);

Route::resource('events', EventController::class);
