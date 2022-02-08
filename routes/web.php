<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\AdminProvinceController;
use App\Http\Controllers\AdminRegencyController;
use App\Http\Controllers\AdminDistrictController;
use App\Http\Controllers\AdminVillageController;

use App\Http\Controllers\AdminPerusahaanController;
use App\Http\Controllers\AdminPengaduController;
use App\Http\Controllers\AdminPerihalController;
use App\Http\Controllers\AdminPengaduanController;
use App\Http\Controllers\AdminTanggapanController;

use App\Http\Controllers\PengaduanController;
use App\Models\Perusahaan;
use App\Models\Perihal;

use App\Http\Controllers\AdminLaporanController;
// use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Admin Tutorial
// Route::group(['prefix' => 'admin', 'midlleware' =>['isAdmin','auth','PreventBackHistory']], function(){
//     Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
//     Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
//     Route::get('settings', [AdminController::class, 'settings'])->name('admin.settings');
// });

// Route User Tutorial
// Route::group(['prefix' => 'user', 'midlleware' =>['isUser','auth','PreventBackHistory']], function(){
//     Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
//     Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
//     Route::get('settings', [UserController::class, 'settings'])->name('user.settings');
// });

// Route Data Daerah
Route::get('provinces', [AdminProvinceController::class, 'select'])->name('provinceSelect');
Route::get('regencies', [AdminRegencyController::class, 'select'])->name('regencySelect');
Route::get('districts', [AdminDistrictController::class, 'select'])->name('districtSelect');
Route::get('villages', [AdminVillageController::class, 'select'])->name('villageSelect');


// Export dan Import
Route::get('perihalsexportexcel',[AdminPerihalController::class, 'exportexcel'])->name('perihalExportExcel');
Route::post('perihalsimportexcel',[AdminPerihalController::class, 'importexcel'])->name('perihalImportExcel');

Route::get('provincesexportexcel',[AdminProvinceController::class, 'exportexcel'])->name('provinceExportExcel');
Route::post('provincesimportexcel',[AdminProvinceController::class, 'importexcel'])->name('provinceImportExcel');

Route::get('regenciesexportexcel',[AdminRegencyController::class, 'exportexcel'])->name('regencyExportExcel');
Route::post('regenciesimportexcel',[AdminRegencyController::class, 'importexcel'])->name('regencyImportExcel');

Route::get('districtsexportexcel',[AdminDistrictController::class, 'exportexcel'])->name('districtExportExcel');
Route::post('districtsimportexcel',[AdminDistrictController::class, 'importexcel'])->name('districtImportExcel');

Route::get('villagesexportexcel',[AdminVillageController::class, 'exportexcel'])->name('villageExportExcel');
Route::post('villagesimportexcel',[AdminVillageController::class, 'importexcel'])->name('villageImportExcel');

Route::get('laporansexportpdf',[AdminLaporanController::class, 'exportpdf'])->name('laporanExportPdf');


// Route Admin Default
Route::prefix('admin')->middleware(['isAdmin','auth','PreventBackHistory'])->group(function () {
    Route::get('dashboard',[AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class, 'profile'])->name('admin.profile');
    // Route::get('settings',[AdminController::class, 'settings'])->name('admin.settings');

    Route::post('update-profile-info',[AdminController::class, 'updateInfo'])->name('adminUpdateInfo');
    Route::post('change-profile-picture',[AdminController::class, 'updatePicture'])->name('adminPictureUpdate');
    Route::post('change-password',[AdminController::class, 'changePassword'])->name('adminChangePassword');
    
    // Route::get('provinces', [AdminProvinceController::class, 'select'])->name('provinceSelect');
    Route::get('provinces/checkSlug', [AdminProvinceController::class, 'checkSlug']);
    Route::resource('provinces', AdminProvinceController::class);

    // Route::get('regencies', [AdminRegencyController::class, 'select'])->name('regencySelect');
    Route::get('regencies/checkSlug', [AdminRegencyController::class, 'checkSlug']);
    Route::resource('regencies', AdminRegencyController::class);
    
    // Route::get('districts', [AdminDistrictController::class, 'select'])->name('districtSelect');
    Route::get('districts/checkSlug', [AdminDistrictController::class, 'checkSlug']);
    Route::resource('districts', AdminDistrictController::class);
    
    // Route::get('villages', [AdminVillageController::class, 'select'])->name('villageSelect');
    Route::get('villages/checkSlug', [AdminVillageController::class, 'checkSlug']);
    Route::resource('villages', AdminVillageController::class);
    
    Route::get('perusahaans/checkSlug', [AdminPerusahaanController::class, 'checkSlug']);
    Route::resource('perusahaans', AdminPerusahaanController::class);

    Route::resource('pengadu', AdminPengaduController::class);

    Route::get('perihals/checkSlug', [AdminPerihalController::class, 'checkSlug']);
    Route::resource('perihals', AdminPerihalController::class);

    Route::resource('pengaduans', AdminPengaduanController::class);

    // // Route::post('confirms', AdminPengaduanController::class);
    // Route::post('confirms',[AdminPengaduanController::class, 'confirms'])->name('adminChangePassword');
    Route::resource('tanggapans', AdminTanggapanController::class);

    Route::resource('laporans', AdminLaporanController::class);
});

// Route User Default
Route::prefix('/')->middleware(['isUser','auth','PreventBackHistory'])->group(function () {
    Route::get('dashboard',[UserController::class, 'index'])->name('user.dashboard');
    Route::get('profile',[UserController::class, 'profile'])->name('user.profile');
    // Route::get('settings',[UserController::class, 'settings'])->name('user.settings');
    
    Route::post('update-profile-info',[UserController::class, 'updateInfo'])->name('userUpdateInfo');
    Route::post('change-profile-picture',[UserController::class, 'updatePicture'])->name('userPictureUpdate');
    Route::post('change-password',[UserController::class, 'changePassword'])->name('userChangePassword');

    Route::get('pengaduans/checkSlug', [PengaduanController::class, 'checkSlug']);
    Route::resource('pengaduans', PengaduanController::class);
    
    // Route::get('pengaduans', [PengaduanController::class, 'index']);
    // Route::get('pengaduans/{pengaduan:slug}', [PengaduanController::class, 'show']);

    Route::get('perusahaans/{perusahaan:slug}', function(Perusahaan $perusahaan){
        return view('dashboards.users.perusahaans.index', [
            'pengaduans' => $perusahaan->pengaduans,
            'perusahaan' => $perusahaan->name
        ]);
    });

    Route::get('perihals/{perihal:slug}', function(Perihal $perihal){
        return view('dashboards.users.perihals.index', [
            'pengaduans' => $perihal->pengaduans,
            'perihal' => $perihal->name
        ]);
    });
});