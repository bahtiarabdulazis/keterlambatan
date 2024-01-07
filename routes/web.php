<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LatesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RayonsController;
use App\Http\Controllers\RombelsController;
use App\Http\Controllers\StudentsController;

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
Route::get('/login', [UsersController::class, 'login'])->name('login');
Route::post('/login', [UsersController::class, 'loginAuth'])->name('loginAuth');
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');


Route::middleware(['isLogin','isAdmin'])->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('dahsboardAdmin');
    
    Route::get('/', [StudentsController::class, 'count'])->name('count');
    Route::prefix('/lates')->name('lates.')->group(function () {
        Route::get('/index', [LatesController::class, 'index'])->name('index');
        Route::get('/cetak_pdf/{nis}', [LatesController::class, 'cetak_pdf'])->name('cetak_pdf');
        Route::get('/view_pdf/{nis}', [LatesController::class, 'view_pdf'])->name('view_pdf');
        Route::get('/download_pdf/{nis}', [LatesController::class, 'download_pdf'])->name('download_pdf');
        Route::get('/export_excel', [LatesController::class, 'export_excel'])->name('export_excel');
        Route::get('/cetak_excel', [LatesController::class, 'cetak_excel'])->name('cetak_excel');
        Route::get('/create', [LatesController::class, 'create'])->name('create');
        Route::post('/store', [LatesController::class, 'store'])->name('store');
        Route::get('/{id}', [LatesController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [LatesController::class, 'update'])->name('update');
        Route::delete('/{id}', [LatesController::class, 'destroy'])->name('delete');
        Route::get('/detail/{nis}', [LatesController::class, 'detail'])->name('detail');
    });
    
    Route::prefix('/rombel')->name('rombel.')->group(function () {
        Route::get('/index', [RombelsController::class, 'index'])->name('index');
        Route::get('/create', [RombelsController::class, 'create'])->name('create');
        Route::post('/store', [RombelsController::class, 'store'])->name('store');
        Route::get('/{id}', [RombelsController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [RombelsController::class, 'update'])->name('update');
        Route::delete('/{id}', [RombelsController::class, 'destroy'])->name('delete');
    });
    
    Route::prefix('/user')->name('user.')->group(function () {
        Route::get('/index', [UsersController::class, 'index'])->name('index');
        Route::get('/create', [UsersController::class, 'create'])->name('create');
        Route::post('/store', [UsersController::class, 'store'])->name('store');
        Route::get('/{id}', [UsersController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [UsersController::class, 'update'])->name('update');
        Route::delete('/{id}', [UsersController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('/rayon')->name('rayon.')->group(function () {
        Route::get('/index', [RayonsController::class, 'index'])->name('index');
        Route::get('/create', [RayonsController::class, 'create'])->name('create');
        Route::post('/store', [RayonsController::class, 'store'])->name('store');
        Route::get('/{id}', [RayonsController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [RayonsController::class, 'update'])->name('update');
        Route::delete('/{id}', [RayonsController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('/student')->name('student.')->group(function () {
        Route::get('/index', [StudentsController::class, 'index'])->name('index');
        Route::get('/create', [StudentsController::class, 'create'])->name('create');
        Route::post('/store', [StudentsController::class, 'store'])->name('store');
        Route::get('/{id}', [StudentsController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [StudentsController::class, 'update'])->name('update');
        Route::delete('/{id}', [StudentsController::class, 'destroy'])->name('destroy');
    });
    
});

Route::middleware(['isLogin','isUser'])->group(function () {
    Route::get('/dashboardPs', [studentsController::class, 'dashboardPs'])->name('dashboardPs');
    Route::prefix('/latesPs')->name('latesPs.')->group(function () {
        Route::get('/indexPs', [LatesController::class, 'indexPs'])->name('indexPs');
        Route::get('/detailPs/{nis}', [LatesController::class, 'detailPs'])->name('detailPs');
        Route::get('/cetak_pdfPs/{nis}', [LatesController::class, 'cetak_pdfPs'])->name('cetak_pdfPs');
        Route::get('/view_pdfPs/{nis}', [LatesController::class, 'view_pdfPs'])->name('view_pdfPs');
        Route::get('/export_excelPs', [LatesController::class, 'export_excelPs'])->name('export_excelPs');
        Route::get('/cetak_excelPs', [LatesController::class, 'cetak_excelPs'])->name('cetak_excelPs');
        Route::get('/download_pdfPs/{nis}', [LatesController::class, 'download_pdfPs'])->name('download_pdfPs');
        Route::get('/dataSiswa', [LatesController::class, 'dataSiswa'])->name('dataSiswa');    
    });
});

Route::get('/error.permission', function() {
    return view('errors.permission');
})->name('error.permission');