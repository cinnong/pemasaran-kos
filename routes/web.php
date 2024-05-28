<?php

use App\Models\properties;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

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

Route::get('/', function () {
    return view('beranda');
});

Route::get('/dashboard', function () {
    $properties = properties::all();
    return view('dashboard', compact('properties'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Properties
Route::get('/add', [PropertyController::class, 'create'])->name('properties.create');
Route::post('/store', [PropertyController::class, 'store'])->name('properties.store');
Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');
Route::get('/edit/{property}/edit', [PropertyController::class, 'edit'])->name('properties.edit');
Route::put('/update/{property}', [PropertyController::class, 'update'])->name('properties.update');
Route::delete('/dashboard/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');

require __DIR__.'/auth.php';
