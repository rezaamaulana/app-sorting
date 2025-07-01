<?php

use App\Http\Controllers\Guru\UserManager;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BubbleSortController;
use App\Http\Controllers\InsertionSortController;
use App\Http\Controllers\SelectionSortController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

/*Route::get('/', function () {
    return view('home', [
        "title" => "Home"
        ]);
        });*/



Route::get('/', [HomeController::class, 'beranda']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store'])->name('post.regis');
Route::post('/login', [LoginController::class, 'authenticate'])->name('post.login');

Route::middleware('auth')->group(function () {


    Route::get('/dashboard/bubble', [BubbleSortController::class, 'index']);
    Route::get('/dashboard/insertion', [InsertionSortController::class, 'index']);
    Route::get('/dashboard/selection', [SelectionSortController::class, 'index']);
    Route::get('/dashboard/kuis/kuisBubble', [BubbleSortController::class, 'kuis']);
    Route::get('/dashboard/kuis/kuisInsertion', [InsertionSortController::class, 'kuis']);
    Route::get('/dashboard/kuis/kuisSelection', [SelectionSortController::class, 'kuis']);
    Route::get('/dashboard/evaluasi/evaluasiAwal', [EvaluasiController::class, 'index']);

    Route::get('/dashboard', [HomeController::class, 'index']);

    Route::get('/dashboard/evaluasi/evaluasi', [EvaluasiController::class, 'startQuiz']);
    Route::get('/dashboard/kuis/IsiKuisBubble', [BubbleSortController::class, 'startQuiz']);
    Route::get('/dashboard/kuis/IsiKuisInsertion', [InsertionSortController::class, 'startQuiz']);
    Route::get('/dashboard/kuis/IsiKuisSelection', [SelectionSortController::class, 'startQuiz']);

    Route::get('/dashboard/latihan/latihanBubble', [BubbleSortController::class, 'latihan'])->name('latihan.bubble');
    Route::get('/dashboard/latihan/latihanInsertion', [InsertionSortController::class, 'latihan']);
    Route::get('/dashboard/latihan/latihanSelection', [SelectionSortController::class, 'latihan']);

    Route::get('/dashboard/latihan/isiLatihanBubble', [BubbleSortController::class, 'isiLatihan']);
    Route::get('/dashboard/latihan/isiLatihanInsertion', [InsertionSortController::class, 'isiLatihan']);
    Route::get('/dashboard/latihan/isiLatihanSelection', [SelectionSortController::class, 'isiLatihan']);


    Route::get('/dashboard/bubble/coba', [BubbleSortController::class, 'coba']);
    Route::get('/dashboard/panggil/cptp', [HomeController::class, 'cptp']);


    // Route::get('/guru', [GuruController::class, 'index'])->name('guru.dashboard');
    Route::get('/guru/user/data', [UserManager::class, 'getUsers'])->name('guru.user.data');
    Route::resource('/guru/user', UserManager::class)->names([
        'index' => 'guru.user.index',
        'create' => 'guru.user.create',
        'store' => 'guru.user.store',
        'edit' => 'guru.user.edit',
        'update' => 'guru.user.update',
        'destroy' => 'guru.user.destroy'
    ]);


    Route::post('kuis/submit', [QuizController::class, 'submit'])->name('kuis.submit');

    Route::get('/guru/hasil-belajar/{materi}', [App\Http\Controllers\Guru\HasilBelajar::class, 'HasilKuis'])->name('guru.hasil.belajar');
    Route::post('/guru/kkm/set/{materi}', [App\Http\Controllers\Guru\HasilBelajar::class, 'setKKM'])->name('guru.kkm.set');
});
