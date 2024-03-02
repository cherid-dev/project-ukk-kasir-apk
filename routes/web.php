<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
// Admin
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\ProfilAdminController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\KategoriAdminController;
use App\Http\Controllers\ProdukAdminController;
use App\Http\Controllers\PelangganAdminController;
use App\Http\Controllers\SupplierAdminController;
use App\Http\Controllers\PembelianAdminController;
use App\Http\Controllers\DetailPembelianAdminController;
use App\Http\Controllers\PenjualanAdminController;
use App\Http\Controllers\DetailPenjualanAdminController;
// Petugas
use App\Http\Controllers\UserPetugasController;
use App\Http\Controllers\ProfilPetugasController;
use App\Http\Controllers\DashboardPetugasController;
use App\Http\Controllers\ProdukPetugasController;
use App\Http\Controllers\PelangganPetugasController;
use App\Http\Controllers\PenjualanPetugasController;
use App\Http\Controllers\DetailPenjualanPetugasController;

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

// Route::get('admin', function () {
//     return view('admin.index');
// });

// Login
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

// Logout
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

// Dashboard Admin
Route::prefix('admin')->middleware('auth', 'access:Admin')->group(function () {
    // Dashboard
    Route::get('dashboard', [DashboardAdminController::class, 'index'])->name('dashboardadmin');
    // Laporan
    Route::get('dashboard/laporan-aplikasi/{tanggalAwal}/{tanggalAkhir}', [DashboardAdminController::class, 'laporan'])->name('dashboardlaporanadmin');

    // Pembelian
    Route::resource('pembelian', PembelianAdminController::class)->except('search','show','destroy');
    // Print Pembelian
    Route::get('pembelian/print', [PembelianAdminController::class, 'show'])->name('printpembelianadmin');
    // Hapus Pembelian
    Route::get('pembelian/hapus/{id}', [PembelianAdminController::class, 'destroy'])->name('hapuspembelianadmin');

    // Update Pelanggan
    Route::post('pembelian/supplier', [DetailPembelianAdminController::class, 'create'])->name('supplierpembelianadmin');

    // Update Pembelian
    Route::post('pembelian/update', [DetailPembelianAdminController::class, 'update'])->name('updatepembelianadmin');

    // Detail Pembelian
    Route::post('pembelian/detail/tambah', [DetailPembelianAdminController::class, 'store'])->name('detailpembelianadmin');
    // Delete Pembelian
    Route::get('pembelian/detail/hapus', [DetailPembelianAdminController::class, 'destroy'])->name('hapusdetailpembelianadmin');

    // Penjualan
    Route::resource('penjualan', PenjualanAdminController::class)->except('search','show','destroy');
    // Print Penjualan
    Route::get('penjualan/print', [PenjualanAdminController::class, 'show'])->name('printpenjualanadmin');
    // Hapus Penjualan
    Route::get('penjualan/hapus/{id}', [PenjualanAdminController::class, 'destroy'])->name('hapuspenjualanadmin');

    // Update Pelanggan
    Route::post('penjualan/pelanggan', [DetailPenjualanAdminController::class, 'create'])->name('memberpenjualanadmin');

    // Update Penjualan
    Route::post('penjualan/update', [DetailPenjualanAdminController::class, 'update'])->name('updatepenjualanadmin');

    // Detail Penjualan
    Route::post('penjualan/detail/tambah', [DetailPenjualanAdminController::class, 'store'])->name('detailpenjualanadmin');
    // Delete Penjualan
    Route::get('penjualan/detail/hapus', [DetailPenjualanAdminController::class, 'destroy'])->name('hapusdetailpenjualanadmin');

    // Produk
    Route::get('produk', [ProdukAdminController::class, 'index'])->name('produkadmin');
    // Tambah Produk
    Route::get('produk/tambah', [ProdukAdminController::class, 'create'])->name('tambahprodukadmin');
    Route::post('produk/tambah/action', [ProdukAdminController::class, 'store'])->name('actionprodukadmin');
    // Edit Produk
    Route::get('produk/edit/{id}', [ProdukAdminController::class, 'edit'])->name('editprodukadmin');
    Route::post('produk/edit/{id}', [ProdukAdminController::class, 'update'])->name('updateprodukadmin');
    // Hapus Produk
    Route::get('produk/hapus/{id}', [ProdukAdminController::class, 'destroy'])->name('hapusprodukadmin');
    // Print Produk
    Route::get('produk/laporan-produk', [ProdukAdminController::class, 'print'])->name('printprodukadmin');

    // Kategori
    Route::get('kategori', [KategoriAdminController::class, 'index'])->name('kategoriadmin');
    // Tambah Kategori
    Route::get('kategori/tambah', [KategoriAdminController::class, 'create'])->name('tambahkategoriadmin');
    Route::post('kategori/tambah/action', [KategoriAdminController::class, 'store'])->name('actionkategoriadmin');
    // Edit Kategori
    Route::get('kategori/edit/{id}', [KategoriAdminController::class, 'edit'])->name('editkategoriadmin');
    Route::post('kategori/edit/{id}', [KategoriAdminController::class, 'update'])->name('updatekategoriadmin');
    // Hapus Kategori
    Route::get('kategori/hapus/{id}', [KategoriAdminController::class, 'destroy'])->name('hapuskategoriadmin');
    // Print Kategori
    Route::get('kategori/print', [KategoriAdminController::class, 'edit'])->name('printkategoriadmin');

    // User
    Route::get('user', [UserAdminController::class, 'index'])->name('useradmin');
    // Register
    Route::get('register', [UserAdminController::class, 'create'])->name('register');
    Route::post('actionregister', [UserAdminController::class, 'store'])->name('actionregister');
    // Edit User
    Route::get('user/edit/{id}', [UserAdminController::class, 'edit'])->name('edituseradmin');
    Route::post('user/edit/{id}', [UserAdminController::class, 'update'])->name('updateuseradmin');
    // Hapus User
    Route::get('user/hapus/{id}', [UserAdminController::class, 'destroy'])->name('hapususeradmin');

    // Profil
    Route::get('profil', [ProfilAdminController::class, 'index'])->name('profiladmin');
    Route::patch('profil/{id}', [ProfilAdminController::class, 'update'])->name('updateprofiladmin');

    // Member
    Route::get('member', [PelangganAdminController::class, 'index'])->name('memberadmin');
    // Tambah Member
    Route::get('member/tambah', [PelangganAdminController::class, 'create'])->name('tambahmemberadmin');
    Route::post('member/tambah/action', [PelangganAdminController::class, 'store'])->name('actionmemberadmin');
    // Edit Member
    Route::get('member/edit/{id}', [PelangganAdminController::class, 'edit'])->name('editmemberadmin');
    Route::post('member/edit/{id}', [PelangganAdminController::class, 'update'])->name('updatememberadmin');
    // Hapus Member
    Route::get('member/hapus/{id}', [PelangganAdminController::class, 'destroy'])->name('hapusmemberadmin');

    // Supplier
    Route::get('supplier', [SupplierAdminController::class, 'index'])->name('supplieradmin');
    // Tambah Supplier
    Route::get('supplier/tambah', [SupplierAdminController::class, 'create'])->name('tambahsupplieradmin');
    Route::post('supplier/tambah/action', [SupplierAdminController::class, 'store'])->name('actionsupplieradmin');
    // Edit Supplier
    Route::get('supplier/edit/{id}', [SupplierAdminController::class, 'edit'])->name('editsupplieradmin');
    Route::post('supplier/edit/{id}', [SupplierAdminController::class, 'update'])->name('updatesupplieradmin');
    // Hapus Supplier
    Route::get('supplier/hapus/{id}', [SupplierAdminController::class, 'destroy'])->name('hapussupplieradmin');
});

// Dashboard Petugas
Route::prefix('petugas')->middleware('auth', 'access:Petugas')->group(function () {
    Route::get('dashboard', [DashboardPetugasController::class, 'index'])->name('dashboardpetugas');
    // Dashboard
    Route::get('dashboard', [DashboardPetugasController::class, 'index'])->name('dashboardpetugas');

    // Penjualan
    Route::resource('penjualan', PenjualanPetugasController::class)->except('search','show','destroy');
    // Print Penjualan
    Route::get('penjualan/print', [PenjualanPetugasController::class, 'show'])->name('printpenjualanpetugas');
    // Hapus Penjualan
    Route::get('penjualan/hapus/{id}', [PenjualanPetugasController::class, 'destroy'])->name('hapuspenjualanpetugas');

    // Update Pelanggan
    Route::post('penjualan/pelanggan', [DetailPenjualanPetugasController::class, 'create'])->name('memberpenjualanpetugas');

    // Update Penjualan
    Route::post('penjualan/update', [DetailPenjualanPetugasController::class, 'update'])->name('updatepenjualanpetugas');

    // Detail Penjualan
    Route::post('penjualan/detail/tambah', [DetailPenjualanPetugasController::class, 'store'])->name('detailpenjualanpetugas');

    // Produk
    Route::get('produk', [ProdukPetugasController::class, 'index'])->name('produkpetugas');
    // Tambah Produk
    Route::get('produk/tambah', [ProdukPetugasController::class, 'create'])->name('tambahprodukpetugas');
    Route::post('produk/tambah/action', [ProdukPetugasController::class, 'store'])->name('actionprodukpetugas');
    // Edit Produk
    Route::get('produk/edit/{id}', [ProdukPetugasController::class, 'edit'])->name('editprodukpetugas');
    Route::post('produk/edit/{id}', [ProdukPetugasController::class, 'update'])->name('updateprodukpetugas');
    // Hapus Produk
    Route::get('produk/hapus/{id}', [ProdukPetugasController::class, 'destroy'])->name('hapusprodukpetugas');
    // Print Produk
    Route::get('produk/print', [ProdukPetugasController::class, 'edit'])->name('printprodukpetugas');

    // User
    Route::get('user', [UserPetugasController::class, 'index'])->name('userpetugas');

    // Profil
    Route::get('profil', [ProfilPetugasController::class, 'index'])->name('profilpetugas');
    Route::patch('profil/{id}', [ProfilPetugasController::class, 'update'])->name('updateprofilpetugas');

    // Member
    Route::get('member', [PelangganPetugasController::class, 'index'])->name('memberpetugas');
    // Tambah Member
    Route::get('member/tambah', [PelangganPetugasController::class, 'create'])->name('tambahmemberpetugas');
    Route::post('member/tambah/action', [PelangganPetugasController::class, 'store'])->name('actionmemberpetugas');
    // Edit Member
    Route::get('member/edit/{id}', [PelangganPetugasController::class, 'edit'])->name('editmemberpetugas');
    Route::post('member/edit/{id}', [PelangganPetugasController::class, 'update'])->name('updatememberpetugas');
    // Hapus Member
    Route::get('member/hapus/{id}', [PelangganPetugasController::class, 'destroy'])->name('hapusmemberpetugas');
});