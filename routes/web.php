<?php

use App\Http\Controllers\DispatcheController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WorkerController;
use App\Http\Middleware\DisableCache;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login', 301);

Route::middleware("no-cache")->group(function () {


    Route::middleware("auth")->group(function () {
        Route::get("/menu", function () {
            return view("menu");
        })->name("menu");
        Route::resource('event', EventController::class);
        Route::resource('dispatche', DispatcheController::class);
        Route::resource('worker', WorkerController::class);
        Route::post("/logout", [LoginController::class, "logout"]);
    });

    Route::get('/login', function () {
        return view('login');
    })->name("login");
    Route::post('/login', [LoginController::class, "login"]);

});