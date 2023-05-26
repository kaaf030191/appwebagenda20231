<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CityController;

Route::get('/', function () {
	return view('welcome');
});

Route::get('city/getall', [CityController::class, 'actionGetAll']);