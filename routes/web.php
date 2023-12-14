<?php

use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/zip/{path?}', [ListController::class, 'zip'])->where('path', '(.*)');
Route::get('/{path?}', [ListController::class, 'show'])->where('path', '(.*)');
