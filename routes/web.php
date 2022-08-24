<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ScheduleController::class, 'index']);

Route::resource('schedule', ScheduleController::class);

Route::post('schedule/filter', [ScheduleController::class, 'filter'])->name('schedule.filter');