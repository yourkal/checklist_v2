<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChecklistController;


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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/checklists', [ChecklistController::class, 'index'])->name('checklists.index');
Route::post('/checklists/store', [ChecklistController::class, 'store'])->name('checklists.store');
