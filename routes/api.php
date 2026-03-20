<?php

use App\Http\Controllers\AssetController;
use Illuminate\Support\Facades\Route;

Route::post('assets', [AssetController::class, 'create']);
Route::get('assets/{id}', [AssetController::class, 'fetch']);
