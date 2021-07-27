<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\PencairanController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\TransportasiController;
use App\Http\Controllers\PerjalananController;

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

Route::get('login', [LoginController::class, 'show'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function(){

    Route::get('/', [PengajuanController::class, 'home'])->name('home');

    Route::get('/profile',[ProfileController::class, 'index']);
    Route::get('profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile/{id}/update', [ProfileController::class, 'update'])->name('update.profile');
    Route::get('/changeProfilePassword',[ChangePasswordController::class, 'changeProfilePassword'])->name('changeProfilePassword');
    Route::post('/changeProfilePassword/edit', [ChangePasswordController::class, 'changeProfilePasswords'])->name('changeProfilePasswords');

    Route::get('/users',[UsersController::class, 'index'])->name('users'); 
    Route::get('/users/create',[UsersController::class, 'create'])->name('register.users'); 
    Route::get('/users/{id}/show',[UsersController::class, 'show'])->name('show.users'); 
    Route::post('/users/store',[UsersController::class, 'store'])->name('store.users'); 
    Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::post('/users/{id}/update', [UsersController::class, 'update'])->name('update.users');
    Route::delete('/users/{id}/destroy',[UsersController::class, 'destroy'])->name('destroy.users');  
    Route::get('/changeUserPassword/{id}/edit',[ChangePasswordController::class, 'changeUserPassword'])->name('changeUserPassword');  
    Route::post('/changeUserPasswords/{id}/edit', [ChangePasswordController::class, 'changeUserPasswords'])->name('changeUserPasswords');

    Route::group(['prefix' => 'pengajuan', 'middleware' => ['pengajuan']], function(){
        Route::get('/', [PengajuanController::class, 'index'])->name('pengajuan.index');
        Route::get('create', [PengajuanController::class, 'create'])->name('pengajuan.create');
        Route::post('create', [PengajuanController::class, 'store'])->name('pengajuan.store');
        Route::get('{id}', [PengajuanController::class, 'view'])->name('pengajuan.view');
        Route::get('{id}/riwayat', [PengajuanController::class, 'riwayat'])->name('pengajuan.riwayat');
        Route::get('{id}/download', [PengajuanController::class, 'download'])->name('pengajuan.download');
        Route::get('{id}/edit', [PengajuanController::class, 'edit'])->name('pengajuan.edit');
        Route::patch('{id}/edit', [PengajuanController::class, 'update'])->name('pengajuan.update');
    });

    Route::group(['prefix' => 'approval', 'middleware' => ['approval']], function(){
        Route::get('/', [ApprovalController::class, 'index'])->name('approval.index');
        Route::get('{id}', [ApprovalController::class, 'view'])->name('approval.view');
        Route::patch('{id}', [ApprovalController::class, 'process'])->name('approval.process');
    });

    Route::group(['prefix' => 'pencairan', 'middleware' => ['pencairan']], function(){
        Route::get('/', [PencairanController::class, 'index'])->name('pencairan.index');
        Route::get('{id}', [PencairanController::class, 'view'])->name('pencairan.view');
        Route::patch('{id}', [PencairanController::class, 'process'])->name('pencairan.process');
    });

    Route::get('/perjalanan',[PerjalananController::class, 'index'])->name('perjalanan');
    Route::get('/perjalanan/create',[PerjalananController::class, 'create'])->name('register.perjalanan');
    Route::post('/perjalanan/store',[PerjalananController::class, 'store'])->name('store.perjalanan'); 
    Route::get('/perjalanan/{id}/show',[PerjalananController::class, 'show'])->name('show.perjalanan'); 
    Route::delete('/perjalanan/{id}/destroy',[PerjalananController::class, 'destroy'])->name('destroy.perjalanan'); 
    Route::get('/perjalanan/{id}/edit', [PerjalananController::class, 'edit'])->name('perjalanan.edit');
    Route::post('/perjalanan/{id}/update', [PerjalananController::class, 'update'])->name('update.perjalanan');

    Route::get('/transportasi',[TransportasiController::class, 'index'])->name('transportasi');
    Route::get('/transportasi/create',[TransportasiController::class, 'create'])->name('register.transportasi');
    Route::post('/transportasi/store',[TransportasiController::class, 'store'])->name('store.transportasi'); 
    Route::get('/transportasi/{id}/show',[TransportasiController::class, 'show'])->name('show.transportasi'); 
    Route::delete('/transportasi/{id}/destroy',[TransportasiController::class, 'destroy'])->name('destroy.transportasi'); 
    Route::get('/transportasi/{id}/edit', [TransportasiController::class, 'edit'])->name('transportasi.edit');
    Route::post('/transportasi/{id}/update', [TransportasiController::class, 'update'])->name('update.transportasi'); 


});
