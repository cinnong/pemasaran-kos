<?php

use App\Models\Datakos;
use App\Models\User;
use App\Models\PemilikKos;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatakosController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PemilikKosAuthController;
use App\Http\Controllers\Auth\RegisteredPemilikController;
use App\Http\Controllers\PemilikKosController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PemesananController;
use App\Models\Pembayaran;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;

// Pemilik Kos
Route::get('pemilik_kos/register', [RegisteredPemilikController::class, 'create'])->name('pemilik_kos.register');
Route::post('pemilik_kos/register', [RegisteredPemilikController::class, 'store'])->name('pemilik_kos.register.store');
Route::get('/dashboard', [PemilikKosController::class, 'dashboard'])->name('pemilik_kos.dashboard');
Route::get('pemilik-kos/login', [PemilikKosAuthController::class, 'showLoginForm'])->name('pemilik_kos.login_form');
Route::post('pemilik-kos/login', [PemilikKosAuthController::class, 'login'])->name('pemilik_kos.login');
Route::get('/pemilik-kos/datakos', [PemilikKosController::class, 'datakospemilik'])->name('pemilik.datakos');
Route::get('/pemilik-kos/pemesanan', [PemesananController::class, 'pesanan'])->name('pemilik.pemesanan');
Route::get('/pemilik-kos/pesanan', [PemilikKosController::class, 'pemesan'])->name('pemilik.user');
Route::get('/pemilik-kos/pembayaran', [PemilikKosController::class, 'pembayaran'])->name('pemilik.pembayaran');
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
Route::get('/data-pemilik', function () {
    return view('pemilik_kos.data-pemilik');
});
Route::resource('pemilik_kos', PemilikKosController::class);
Route::get('/datapemilik', [AdminController::class, 'pemilik'])
    ->name('datapemilik');

// Auth
Route::get('/search', [DatakosController::class, 'search'])->name('search');
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('Login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);


Route::get('/', function () {
    $datakos = Datakos::where('status', 'Setuju')->get();
    return view('beranda', compact('datakos'));
})->name('beranda');

// Admin
Route::get('/login-admin', function() {
    return view('admin.login-admin');
})->name('login-admin');
Route::get('/beranda-admin', function () {
    $datakos = Datakos::all();
    $user = User::all();
    $datapemilik = PemilikKos::all();
    $count = Datakos::count();
    $countuser = User::count();
    $countpemilik = PemilikKos::count();
    $countpemesanan = Pemesanan::count();
    $countpembayaran = Pembayaran::count();
    return view('beranda-admin', compact('count', 'countuser', 'countpemilik','countpembayaran','countpemesanan'));
})->name('beranda-admin');
Route::get('/datauser', [AdminController::class, 'index'])->name('datauser');
Route::get('/detailkos/{id}', function($id) {
    $datakos = Datakos::findOrFail($id);
    return view('admin.detail-kos', compact('datakos'));
})->name('detailkos');
Route::get('/editkosadmin/{id}', function($id) {
    $datakos = Datakos::findOrFail($id);
    return view('admin.edit-datakos', compact('datakos'));
})->name('edit-datakos-admin');
Route::put('/editkos-admin/{id}', [AdminController::class, 'editKos'])->name('editkos-admin');
Route::delete('/deletekos-admin/{id}', [AdminController::class, 'deleteKos'])->name('deletekos-admin');
Route::delete('/account/delete/{id}', [PemilikKosAuthController::class, 'destroy'])->name('account.delete');



// Data Kos
Route::get('/datakos', function () {
    $datakos = Datakos::all();
    $datapemilik = PemilikKos::all();
    return view('admin.data-kos', compact('datakos', 'datapemilik'));
})->name('datakos');
Route::get('/add', [DatakosController::class, 'create'])->name('datakos.create');
Route::post('/store', [DatakosController::class, 'store'])->name('datakos.store');
Route::get('/datakos/{datakos}', [DatakosController::class, 'show'])->name('datakos.show');
Route::get('/edit/{datakos}', [DatakosController::class, 'edit'])->name('datakos.edit');
Route::put('/update/{datakos}', [DatakosController::class, 'update'])->name('datakos.update');
Route::delete('/input/{datakos}', [DatakosController::class, 'destroy'])->name('datakos.destroy');
Route::put('/kos/{id}/status', [DatakosController::class, 'updateStatus'])->name('kos.updateStatus');



//PembayaranController
Route::post('pembayaran/store', [PembayaranController::class, 'store'])->name('pembayaran.store');
Route::get('pembayaran/create/{pemesanan_id}', [PembayaranController::class, 'create'])->name('pembayaran.create');
Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.show');

// PemesananController
Route::get('/pemesanans', [PemesananController::class, 'index'])->name('pemesanans.index');
Route::get('/pemesanan/pesan/{datakos_id}', [PemesananController::class, 'pesan'])->name('pemesanan.pesan');
Route::post('/pemesanans/store', [PemesananController::class, 'store'])->name('pemesanans.store');
Route::get('/pemesanan/card/{id}', function ($id) {
    $pemesanan = Pemesanan::findOrFail($id);
    return view('pemesanan.card-pemesanan', compact('pemesanan'));
})->name('card.pemesanan');
Route::put('/pemesanans/{pemesanan}', [PemesananController::class, 'update'])->name('pemesanans.update');
Route::get('/pemesanan/upload-bukti/{id}', function ($id_kos) {
    $pemesanan = Pemesanan::with('datakos')->findOrFail($id_kos);
    return view('pemesanan.upload-bukti', compact('pemesanan'));
})->name('upload.bukti');
Route::get('/pemesanan/card-welcome', function () {
    $datakos = Datakos::all();
    return view('pemesanan.card-welcome', compact('datakos'));
})->name('card.welcome');

require __DIR__ . '/auth.php';
