<?php

use App\Models\Datakos;
use App\Models\Datapemilik;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatakosController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DatapemilikController;


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
    $datakos = datakos::all();
    return view('beranda', compact('datakos'));
})->name('beranda');

Route::get('/beranda', function () {
    $datakos = datakos::all();
    $count = datakos::count();
    return view('beranda-admin', compact('count'));
})->middleware(['auth', 'verified'])->name('beranda-admin');

Route::get('/datakos', function () {
    $datakos = datakos::all();
    $datapemilik = Datapemilik::all();
    return view('datakos.table-kos', compact('datakos'));
})->name('datakos');

Route::get('/datauser', function () {
    return view('datakos.data-user');
})->name('datauser');

Route::get('/datapemilik', function () {
    $datapemilik = Datapemilik::all();
    return view('datakos.data-pemilik', compact('pemilikKosan'));
})->name('datapemilik');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// datakos
Route::get('/add', [DatakosController::class, 'create'])->name('datakos.create');
Route::post('/store', [DatakosController::class, 'store'])->name('datakos.store');
Route::get('/datakos/{datakos}', [DatakosController::class, 'show'])->name('datakos.show');
Route::get('/edit/{datakos}', [DatakosController::class, 'edit'])->name('datakos.edit');
Route::put('/update/{datakos}', [DatakosController::class, 'update'])->name('datakos.update');
Route::delete('/input/{datakos}', [DatakosController::class, 'destroy'])->name('datakos.destroy');

//datapemilik
Route::get('/datapemilik', [DatapemilikController::class, 'index'])->name('datapemilik.index');
Route::get('/datapemilik/create', [DatapemilikController::class, 'create'])->name('datakos.form-pemilik-kos');
Route::post('/datapemilik', [DatapemilikController::class, 'store'])->name('datapemilik.store');
Route::get('/datapemilik/{datapemilik}', [DatapemilikController::class, 'show'])->name('datapemilik.show');
Route::get('/datapemilik/{datapemilik}/edit', [DatapemilikController::class, 'edit'])->name('datapemilik.edit');
Route::put('/datapemilik/{datapemilik}', [DatapemilikController::class, 'update'])->name('datapemilik.update');
Route::delete('/datapemilik/{datapemilik}', [DatapemilikController::class, 'destroy'])->name('datapemilik.destroy');


require __DIR__.'/auth.php';
