<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShapeController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('tasks', TaskController::class)->except(['show']);
Route::get('tasks/search', [TaskController::class, 'search']);
Route::get('tasks/export', [TaskController::class, 'export']);

Route::apiResource('products', ProductController::class)->except(['show']);


Route::get('shapes/area', [ShapeController::class, 'area']);
Route::get('shapes/perimeter', [ShapeController::class, 'perimeter']);
