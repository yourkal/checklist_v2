<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\AuthController;


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


Route::get('/', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/checklists', [ChecklistController::class, 'index'])->name('checklists.index')->middleware('auth');
Route::post('/checklists/store', [ChecklistController::class, 'store'])->name('checklists.store')->middleware('auth');
Route::get('/checklists/export-pdf', [ChecklistController::class, 'exportPDF'])->name('checklists.export-pdf')->middleware('auth');