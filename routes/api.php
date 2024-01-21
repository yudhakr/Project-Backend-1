<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PelajaranController;
use App\Http\Controllers\SiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('kelas', [KelasController::class, 'index']);                 //Soal 1:   Menampilkan list kelas yang ada   
Route::get('kelas/show/{id}', [KelasController::class, 'show']);        //Soal 2:   Menampilkan detail suatu kelas (Tampilkan siswa apabila ada)
Route::post('kelas/store', [KelasController::class, 'store']);          //Soal 3:   Menyimpan data kelas baru
Route::post('kelas/update/{id}', [KelasController::class, 'update']);   //Soal 4:   Memperbarui data kelas yang ada
Route::get('siswa', [SiswaController::class, 'index']);                 //Soal 5:   Menampilkan list siswa yang ada
Route::get('siswa/show/{id}', [SiswaController::class, 'show']);        //Soal 6:   Menampilkan detail dari data siswa
Route::get('nilai/show/{id}', [NilaiController::class, 'show']);        //Soal 7:   Menampilkan detail nilai mata pelajaran
Route::post('nilai/store', [NilaiController::class, 'store']);          //Soal 8:   Menyimpan data nilai siswa berdasarkan nilainya


//Tambahan API BackEnd Lainnya
Route::post('siswa/store', [SiswaController::class, 'store']);                  // Menyimpan data siswa baru
Route::post('pelajaran/store', [PelajaranController::class, 'store']);          // Menyimpan data pelajaran baru
Route::get('pelajaran', [PelajaranController::class, 'index']);                 // Menampilkan list pelajaran yang ada 
Route::post('siswa/update/{id}', [SiswaController::class, 'update']);           // Memperbarui data siswa yang ada
Route::post('pelajaran/update/{id}', [PelajaranController::class, 'update']);   // Memperbarui data pelajaran yang ada
Route::post('nilai/update/{id}', [NilaiController::class, 'update']);           // Memperbarui data nilai yang ada
Route::post('kelas/destroy/{id}', [KelasController::class, 'store']);           // Hapus data kelas sesuai dengan _id-nya
Route::post('siswa/destroy/{id}', [SiswaController::class, 'store']);           // Hapus data siswa sesuai dengan _id-nya
Route::post('pelajaran/destroy/{id}', [PelajaranController::class, 'store']);   // Hapus data pelajaran sesuai dengan _id-nya
Route::post('nilai/destroy/{id}', [NilaiController::class, 'store']);           // Hapus data pelajaran sesuai dengan _id-nya



