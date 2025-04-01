<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::resource('events', EventController::class);

Route::get('/', function () {
    return redirect('/events');
});
