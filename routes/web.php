<?php

use App\Models\Datakos;
use App\Models\Datapemilik;
use App\Models\User;
use App\Models\PemilikKos;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatakosController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DatapemilikController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PemilikKosAuthController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Auth\RegisteredPemilikController;
use App\Http\Controllers\PemilikKosController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PemesananController;
use App\Models\Pembayaran;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;

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

Route::get('pemilik_kos/register', [RegisteredPemilikController::class, 'create'])->name('pemilik_kos.register');
Route::post('pemilik_kos/register', [RegisteredPemilikController::class, 'store'])->name('pemilik_kos.register.store');
Route::get('/dashboard', [PemilikKosController::class, 'dashboard'])->name('pemilik_kos.dashboard');
Route::get('pemilik-kos/login', [PemilikKosAuthController::class, 'showLoginForm'])->name('pemilik_kos.login_form');
Route::post('pemilik-kos/login', [PemilikKosAuthController::class, 'login'])->name('pemilik_kos.login');

Route::get('/search', [DatakosController::class, 'search'])->name('search');
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('Login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);


Route::get('/', function () {
    $datakos = Datakos::where('status', 'Setuju')->get();
    return view('beranda', compact('datakos'));
})->name('beranda');



Route::get('/beranda-admin', function () {
    $datakos = Datakos::all();
    $user = User::all();
    $datapemilik = PemilikKos::all();
    $count = Datakos::count();
    $countuser = User::count();
    $countpemilik = PemilikKos::count();
    return view('beranda-admin', compact('count', 'countuser', 'countpemilik'));
})->name('beranda-admin');

Route::get('/datakos', function () {
    $datakos = Datakos::all();
    $datapemilik = PemilikKos::all();
    return view('admin.data-kos', compact('datakos', 'datapemilik'));
})->name('datakos');

Route::put('/kos/{id}/status', [DatakosController::class, 'updateStatus'])->name('kos.updateStatus');

Route::get('/login-admin', function() {
    return view('admin.login-admin');
})->name('login-admin');

Route::get('/datauser', [AdminController::class, 'index'])->name('datauser');

Route::get('/datapemilik', [AdminController::class, 'pemilik'])
    ->name('datapemilik');

Route::get('/pemilik-kos/dashboard', function () {
    $pemilikKos = Auth::guard('pemilik_kos')->user();

    // Jumlah user yang melakukan pesanan pada kos yang dimiliki pemilik kos yang login
    $jumlahUserPesan = Pemesanan::where('pemilik_kos_id', $pemilikKos->id)
        ->distinct('user_id')
        ->count('user_id');

    // Jumlah pemesanan yang dilakukan user pada kos yang dimiliki pemilik kos yang login
    $jumlahPemesanan = Pemesanan::where('pemilik_kos_id', $pemilikKos->id)
        ->count();

    // Jumlah pembayaran yang dilakukan user pada kos yang dimiliki pemilik kos yang login
    $jumlahPembayaran = Pembayaran::whereHas('pemesanan', function ($query) use ($pemilikKos) {
        $query->where('pemilik_kos_id', $pemilikKos->id);
    })->count();
    return view('pemilik_kos.dashboard', compact('jumlahUserPesan', 'jumlahPemesanan', 'jumlahPembayaran'));
})->name('pemilik.dashboard');
Route::get('/pemilik-kos/datakos', [PemilikKosController::class, 'datakospemilik'])->name('pemilik.datakos');
Route::get('/pemilik-kos/pemesanan', [PemesananController::class, 'pesanan'])->name('pemilik.pemesanan');
Route::get('/pemilik-kos/pesanan', [PemilikKosController::class, 'pemesan'])->name('pemilik.user');
Route::get('/pemilik-kos/pembayaran', [PemilikKosController::class, 'pembayaran'])->name('pemilik.pembayaran');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// datakoss
Route::get('/add', [DatakosController::class, 'create'])->name('datakos.create');
Route::post('/store', [DatakosController::class, 'store'])->name('datakos.store');
Route::get('/datakos/{datakos}', [DatakosController::class, 'show'])->name('datakos.show');
Route::get('/edit/{datakos}', [DatakosController::class, 'edit'])->name('datakos.edit');
Route::put('/update/{datakos}', [DatakosController::class, 'update'])->name('datakos.update');
Route::delete('/input/{datakos}', [DatakosController::class, 'destroy'])->name('datakos.destroy');

//datapemilik

Route::get('/datapemilik/{pemilik_Kos}', [RegisteredPemilikController::class, 'show'])->name('datapemilik.show');

Route::resource('pemilik_kos', PemilikKosController::class);
Route::get('/data-pemilik', function () {
    return view('pemilik_kos.data-pemilik');
});

Route::get('/datauser/{user}', [RegisteredUserController::class, 'show'])->name('datauser.show');



//PembayaranController
Route::resource('pembayarans', PembayaranController::class);
Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.show');

// PemesananController
Route::resource('pemesanans', PemesananController::class);
Route::get('/pemesanans/create', [PemesananController::class, 'create'])->name('pemesanan.pesan');
// Menampilkan formulir untuk upload bukti pembayaran berdasarkan pemesanan_id
Route::get('pembayaran/create/{pemesanan_id}', [PembayaranController::class, 'create'])->name('pembayaran.create');

// Menyimpan bukti pembayaran yang diupload dan membuat entri pembayaran baru
Route::post('pembayaran/store', [PembayaranController::class, 'store'])->name('pembayaran.store');

Route::resource('pemilik_kos', PemilikKosController::class);



//baru
Route::get('/pemesanan/pesan', [PemesananController::class, 'pesan'])->name('pesan');
Route::post('/pemesanan/pesan', [PemesananController::class, 'store'])->name('pemesanan.store');

// Route untuk menyimpan data pemesanan baru
Route::post('/pemesanans/store', [PemesananController::class, 'store'])->name('pemesanans.store');

// Route untuk menampilkan form pemesanan
Route::get('/pemesanans/create', [PemesananController::class, 'create'])->name('pemesanans.create');

//utk nampilin halaman pesan
Route::get('/pemesanan/pesan/{datakos_id}', [PemesananController::class, 'pesan'])->name('pemesanan.pesan');


Route::get('/pemesanans', [PemesananController::class, 'index'])->name('pemesanans.index');

// Route
Route::get('/pemesanan/upload-bukti/{id}', function ($id_kos) {
    $pemesanan = Pemesanan::with('datakos')->findOrFail($id_kos);
    return view('pemesanan.upload-bukti', compact('pemesanan'));
})->name('upload.bukti');


Route::get('/pemesanan/card-welcome', function () {
    $datakos = Datakos::all();
    return view('pemesanan.card-welcome', compact('datakos'));
})->name('card.welcome');

Route::get('/pemesanan/card/{id}', function ($id) {
    $pemesanan = Pemesanan::findOrFail($id);
    return view('pemesanan.card-pemesanan', compact('pemesanan'));
})->name('card.pemesanan');
Route::put('/pemesanans/{pemesanan}', [PemesananController::class, 'update'])->name('pemesanans.update');


//utk tampilkn data-pmsanan di sidebar

Route::get('/pemesan', [PemesananController::class, 'index'])->name('pemesanans.index');


Route::middleware(['auth'])->group(function () {
    Route::post('/pemesanans/store', [PemesananController::class, 'store'])->name('pemesanans.store');
    // Rute lainnya yang membutuhkan autentikasi
});



require __DIR__ . '/auth.php';
