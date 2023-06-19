<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TechnologyController;
use App\Http\Controllers\Api\TypeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('projects', [ProjectController::class, 'index']); // 'projects' è il nome della rotta che si trova in app\Http\Controllers\Api\ProjectController.php
Route::get('projects/{slug}', [ProjectController::class, 'show']); // 'projects' è il nome della rotta che si trova in app\Http\Controllers\Api\ProjectController.php
Route::get('types', [TypeController::class, 'index']);
Route::get('technologies', [TechnologyController::class, 'index']);