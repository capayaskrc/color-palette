<?php

use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {return view('dashboard');});
Route::get('/dashboard/view', [DashboardController::class, 'view'])->name('view_dashboard');
Route::post('/dashboard/save-color-palette', [DashboardController::class, 'save'])->name('save_color_template');

