<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::apiResources([
    '/users' => UserController::class,
    '/estoque' => StockController::class,
    '/clientes' => ClientController::class,
]);