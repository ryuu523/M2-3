<?php

use App\Http\Controllers\DispatcheController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\WorkerController;
use App\Http\Middleware\DisableCache;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login', 301);

Route::middleware("no-cache")->group(function () {


    Route::middleware("auth")->group(function () {
        Route::get("/menu", [MainController::class, "menu"])->name("menu");
        Route::resource('event', EventController::class);
        Route::resource('dispatche', DispatcheController::class);
        Route::resource('worker', WorkerController::class);
        Route::post("/logout", [MainController::class, "logout"]);
    });

    Route::get('/login', [MainController::class, "show_login"])->name("show_login");
    Route::post('/login', [MainController::class, "login"])->name("login");

});