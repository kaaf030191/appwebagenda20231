<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\CityController;

Route::get('/', [IndexController::class, 'actionIndex']);

Route::get('city/getall', [CityController::class, 'actionGetAll']);