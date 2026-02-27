<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\UserhiController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\LoginjoinController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Mews\Captcha\Facades\Captcha;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Mews\Captcha\CaptchaController;

// Route default mews/captcha
Route::get('captcha/{config?}', [CaptchaController::class, 'getCaptcha'])->name('captcha');
Route::get('/captcha-test', function () {
    return view('captcha-test');
});

// Optional: refresh captcha via ajax
Route::get('/refresh-captcha', function () {
    return response()->json(['captcha' => captcha_img('flat')]);
});
/*
|--------------------------------------------------------------------------
| ROUTE PUBLIK (GUEST BOLEH)
|--------------------------------------------------------------------------
*/

Route::get('/', [App\Http\Controllers\UserController::class, 'user'])->name('user.user');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index']);

/*
|--------------------------------------------------------------------------
| ROUTE ADMIN & USER (LOGIN WAJIB)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('content');
    });
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user', [App\Http\Controllers\UserController::class, 'user'])
        ->name('user.user');
});

/*
|--------------------------------------------------------------------------
| ROUTE AUTH UMUM
|--------------------------------------------------------------------------
*/
Route::get('/content', [App\Http\Controllers\PerpustakaanController::class, 'dashboard'])
    ->middleware('auth')
    ->name('content');

Route::post(
    '/pengembalian/{id}/kembalikan',
    [App\Http\Controllers\PerpustakaanController::class, 'kembalikanBuku']
)->middleware('auth');

// Route::get('dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| BUKU (LOGIN WAJIB)
|--------------------------------------------------------------------------
*/
Route::get('/perpustakaan', [BukuController::class, 'show'])->middleware('auth');
Route::get('/update', [BukuController::class, 'update'])->middleware('auth')->name('update');
Route::post('/perpustakaan/proses', [BukuController::class, 'proses'])->middleware('auth');
Route::delete('/hapus/{id}', [BukuController::class, 'hapus'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| PETUGAS (LOGIN WAJIB)
|--------------------------------------------------------------------------
*/
Route::view('/petugas', 'crud_petugas.view-petugas')->middleware('auth');
Route::get('/petugas', [App\Http\Controllers\PetugasController::class, 'petugas'])->middleware('auth');
Route::post('/petugas/proses', [App\Http\Controllers\PetugasController::class, 'proses'])->middleware('auth');
Route::get('/petugas/tambah', [App\Http\Controllers\PetugasController::class, 'tambah'])->middleware('auth');
Route::get('/petugas/hapus/{id}', [App\Http\Controllers\PetugasController::class, 'hapus'])->middleware('auth');
Route::get('/petugas/edit/{id}', [App\Http\Controllers\PetugasController::class, 'edit'])->middleware('auth');
Route::post('/petugas/update', [App\Http\Controllers\PetugasController::class, 'update'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| ANGGOTA (LOGIN WAJIB)
|--------------------------------------------------------------------------
*/
Route::view('/anggota', 'crud_anggota.view-anggota')->middleware('auth');
Route::get('/anggota', [App\Http\Controllers\AnggotaController::class, 'view_anggota'])->middleware('auth');
Route::get('/anggota/tambah', [App\Http\Controllers\AnggotaController::class, 'tambah_anggota'])->middleware('auth');
Route::post('/anggota/proses', [App\Http\Controllers\AnggotaController::class, 'anggota_proses'])->middleware('auth');
Route::get('/anggota/hapus/{id}', [App\Http\Controllers\AnggotaController::class, 'hapus_anggota'])->middleware('auth');
Route::get('/anggota/edit/{id}', [App\Http\Controllers\AnggotaController::class, 'anggota_edit'])->middleware('auth');
Route::post('/anggota/update', [App\Http\Controllers\AnggotaController::class, 'anggota_update'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| UBAH PASSWORD
|--------------------------------------------------------------------------
*/
Route::get('/ubah-pass', [App\Http\Controllers\UbahController::class, 'ubah1'])->middleware('auth');
Route::post('/ubah', [App\Http\Controllers\UbahController::class, 'ubah'])
    ->middleware('auth')
    ->name('ubah');

/*
|--------------------------------------------------------------------------
| TAMBAH BUKU
|--------------------------------------------------------------------------
*/
Route::get('/tambah-buku', [App\Http\Controllers\TambahController::class, 'index'])->middleware('auth');
Route::delete('tambah/hapus/{id}', [App\Http\Controllers\TambahController::class, 'hapus'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/tambah/{id}', [App\Http\Controllers\TambahController::class, 'createPeminjaman'])
        ->whereNumber('id')
        ->name('peminjaman.create');
    Route::get('/tambah/add', [App\Http\Controllers\TambahController::class, 'tambah'])->name('buku.create');
    Route::post('/tambah/store', [App\Http\Controllers\TambahController::class, 'store'])->name('buku.store');
});

/*
|--------------------------------------------------------------------------
| DASHBOARD USER
|--------------------------------------------------------------------------
*/
Route::get('/dashboard-user', [App\Http\Controllers\UserController::class, 'user'])
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| PENGEMBALIAN BUKU
|--------------------------------------------------------------------------
*/
Route::get('/pengembalian-buku', [App\Http\Controllers\PengembalianController::class, 'index'])
    ->middleware('auth')
    ->name('pengembalian-buku');

Route::delete('/user/delete/{id}', [App\Http\Controllers\PengembalianController::class, 'delete'])
    ->middleware('auth')
    ->name('user.hapus');

Route::get('/pengembalian/create', [App\Http\Controllers\PengembalianController::class, 'create'])
    ->middleware('auth')
    ->name('pengembalian.create');

Route::post('/pengembalian/store', [App\Http\Controllers\PengembalianController::class, 'store'])
    ->middleware('auth')
    ->name('pengembalian.store');

Route::get('/pengembalian/edit/{id}', [App\Http\Controllers\PengembalianController::class, 'edit'])
    ->middleware('auth')
    ->name('pengembalian.edit');

Route::post('/pengembalian/update', [App\Http\Controllers\PengembalianController::class, 'update'])
    ->middleware('auth')
    ->name('pengembalian.update');

Route::get('user/ubah-pass', [App\Http\Controllers\UserbController::class, 'ubahpass'])->middleware('auth');
Route::post('user/post', [App\Http\Controllers\UserbController::class, 'ubah'])
    ->middleware('auth')
    ->name('user/ubah');

// jadwal

// end jadwal

/*
|--------------------------------------------------------------------------
| berita
|--------------------------------------------------------------------------
*/
Route::get('/berita', [BeritaController::class, 'show_berita'])
    ->name('berita.index');

Route::get('/berita/create', [BeritaController::class, 'upload'])
    ->name('berita.create');

Route::post('/berita', [BeritaController::class, 'proses_upload'])
    ->name('berita.store');

Route::delete('/berita/{id}', [BeritaController::class, 'hapus'])
    ->name('berita.destroy');

Route::get('/berita/edit/{id}', [BeritaController::class, 'edit'])
    ->name('berita.edit');

Route::post('/berita/{id}', [BeritaController::class, 'update'])
    ->name('berita.update');

// end berita

/*
|--------------------------------------------------------------------------
| jadwal
|--------------------------------------------------------------------------
*/
Route::get('/jadwal', [JadwalController::class, 'show_jadwal'])
    ->name('jadwal.index');

Route::get('/jadwal/create', [JadwalController::class, 'upload_jadwal'])
    ->name('jadwal.create');

Route::post('/jadwal', [JadwalController::class, 'jadwal_upload'])
    ->name('jadwal.store');

Route::get('/jadwal/{id}', [JadwalController::class, 'hapus'])
    ->name('jadwal.destroy');

Route::get('/jadwal/edit/{id}', [JadwalController::class, 'edit'])
    ->name('jadwal.edit');

Route::post('/jadwal/{id}', [JadwalController::class, 'update'])
    ->name('jadwal.update');

// end jadwal

/*
|--------------------------------------------------------------------------
| informasi card
|--------------------------------------------------------------------------
*/
route::get('/info-card', [InfoController::class, 'show'])
    ->name('info-card');

// create
route::get('/info-card/create', [InfoController::class, 'create'])
    ->name('create-info');
route::post('/info-card', [InfoController::class, 'store'])
    ->name('info-card.store');
// end create

// edit
Route::get('/info-card/edit/{id}', [InfoController::class, 'edit'])
    ->name('info-card.edit');

Route::post('/info-card/update/{id}', [InfoController::class, 'update'])
    ->name('info-card.update');

// end edit

// destroy
route::get('/info-card/destroy/{id}', [InfoController::class, 'destroy'])
    ->name('card-destroy');
// end destroy

// end info-card

/*
|--------------------------------------------------------------------------
| hero banner
|--------------------------------------------------------------------------
*/
route::get('/info-hero', [HeroController::class, 'show'])
    ->name('info-hero');

// create
route::get('/hero-banner/create', [HeroController::class, 'create'])
    ->name('hero-create');
route::post('/hero-banner', [HeroController::class, 'store'])
    ->name('hero-banner.store');
// end create

// edit
Route::get('/hero-banner/edit/{id}', [HeroController::class, 'edit'])
    ->name('info-card.edit');

Route::post('/hero-banner/update/{id}', [HeroController::class, 'update'])
    ->name('info-card.update');

// end edit

// destroy
route::get('/hero-banner/destroy/{id}', [HeroController::class, 'destroy'])
    ->name('hero-destroy');
// end destroy
// end hero-banner

/*
|--------------------------------------------------------------------------
| service
|--------------------------------------------------------------------------
*/
route::get('/info-hero', [HeroController::class, 'show'])
    ->name('info-hero');

// create
route::get('/hero-banner/create', [HeroController::class, 'create'])
    ->name('hero-create');
route::post('/hero-banner', [HeroController::class, 'store'])
    ->name('hero-banner.store');
// end create

// edit
Route::get('/hero-banner/edit/{id}', [HeroController::class, 'edit'])
    ->name('info-card.edit');

Route::post('/hero-banner/update/{id}', [HeroController::class, 'update'])
    ->name('info-card.update');

// end edit

// destroy
route::get('/hero-banner/destroy/{id}', [HeroController::class, 'destroy'])
    ->name('hero-destroy');
// end service

/*
|--------------------------------------------------------------------------
|user-hi
|--------------------------------------------------------------------------
*/
route::get('/userhi', [UserhiController::class, 'show'])
    ->name('userhi');

// create
route::get('/userhi/create', [UserhiController::class, 'create'])
    ->name('userhi-create');
route::post('/userhi/store', [UserhiController::class, 'store'])
    ->name('userhi.store');
// end create

// edit
Route::get('/userhi/edit/{id}', [UserhiController::class, 'edit'])
    ->name('userhi.edit');

Route::post('/userhi/update/{id}', [UserhiController::class, 'update'])
    ->name('userhi.update');

// end edit

// destroy
route::get('/userhi/destroy/{id}', [UserhiController::class, 'destroy'])
    ->name('userhi-destroy');
// end service

/*
|--------------------------------------------------------------------------
| card user
|--------------------------------------------------------------------------
*/
route::get('/card/user', [CardController::class, 'show'])
    ->name('card.user');

// create
route::get('/card/create', [CardController::class, 'create'])
    ->name('card-create');
route::post('/card/store', [CardController::class, 'store'])
    ->name('card.store');
// end create

// edit
Route::get('/card/edit/{id}', [CardController::class, 'edit'])
    ->name('card.edit');

Route::post('/card/update/{id}', [CardController::class, 'update'])
    ->name('card.update');

// end edit

// destroy
route::get('/card/destroy/{id}', [CardController::class, 'destroy'])
    ->name('destroy');
// end card

/*
|--------------------------------------------------------------------------
| form
|--------------------------------------------------------------------------
*/
route::get('/form/user', [FormController::class, 'show'])
    ->name('form.user');
Route::get('refresh/captcha', [FormController::class, 'refreshCaptcha'])->name('refresh.captcha');
// create
route::get('/form/create', [FormController::class, 'create'])
    ->name('form-create');
route::post('/form/store', [FormController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('form-store');
// end create

// edit
Route::get('/form/edit/{id}', [FormController::class, 'edit'])
    ->name('form.edit');

Route::post('/form/update/{id}', [FormController::class, 'update'])
    ->name('form.update');

// end edit

// destroy
route::get('/form-contact/destroy/{id}', [FormController::class, 'destroy'])
    ->name('destroy');
// end form

/*
|--------------------------------------------------------------------------
| join-us
|--------------------------------------------------------------------------
*/

route::get('/join-us', [JoinController::class, 'show'])
    ->name('join-us');
// create join us
route::get('/join-us/create', [JoinController::class, 'create'])
    ->name('join-us.create');
route::post('/join-us/store', [JoinController::class, 'store'])
    ->name('join-us.store');
// end join-us

// login-join
route::get('/loginjoin', [LoginjoinController::class, 'show'])
    ->name('loginjoin');
// create join us
route::get('/loginjoin/create', [LoginjoinController::class, 'create'])
    ->name('loginjoin.create');
route::post('/loginjoiin/store', [LoginjoinController::class, 'store'])
    ->name('join-us.store');
// delete
route::delete('/loginjoin/destroy/{id}', [LoginjoinController::class, 'destroy'])
    ->name('loginjoin-destroy');
// end login-join
