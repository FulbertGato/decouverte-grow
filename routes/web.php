<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontContoller;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\GestionnaireContoller;

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

Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/video/{video}', [FrontController::class, 'video'])->name('video.play');
Route::get('/video', [FrontController::class, 'videoS'])->name('video');
Route::get('/podcast', [FrontController::class, 'podcast'])->name('podcast.play');


Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware('auth');
//podcastController list index method
Route::get('/podcasts', [PodcastController::class, 'index'])->name('podcasts.list')->middleware('auth');
//podcastController create method
Route::get('/podcasts/create', [PodcastController::class, 'create'])->name('podcasts.create')->middleware('auth');
//podcastController store method
Route::post('/podcasts', [PodcastController::class, 'store'])->name('podcasts.store')->middleware('auth');
//podcastController edit method
Route::get('/podcasts/edit/{podcast}', [PodcastController::class, 'edit'])->name('podcasts.edit')->middleware('auth');
//podcastController update method
Route::post('/podcasts/{podcast}', [PodcastController::class, 'update'])->name('podcasts.update')->middleware('auth');
//podcastController delete method
Route::get('/podcasts/delete/{podcast}', [PodcastController::class, 'delete'])->name('podcasts.delete')->middleware('auth');
//videoController list index method
Route::get('/videos', [VideoController::class, 'index'])->name('videos.list')->middleware('auth');
//videoController create method
Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create')->middleware('auth');
//videoController store method
Route::post('/videos', [VideoController::class, 'store'])->name('videos.store')->middleware('auth');

//videoController edit method
Route::get('/videos/edit/{video}', [VideoController::class, 'edit'])->name('videos.edit')->middleware('auth');
//videoController update method
Route::post('/videos/{video}', [VideoController::class, 'update'])->name('videos.update')->middleware('auth');
//videoController delete method
Route::get('/videos/delete/{video}', [VideoController::class, 'destroy'])->name('videos.delete')->middleware('auth');

//gestionnaireController list index method
Route::get('/gestionnaires', [GestionnaireContoller::class, 'index'])->name('admin.list')->middleware('auth');
//gestionnaireController create method
Route::get('/gestionnaires/create', [GestionnaireContoller::class, 'create'])->name('admin.create')->middleware('auth');
//gestionnaireController store method
Route::post('/gestionnaires', [GestionnaireContoller::class, 'store'])->name('admin.store')->middleware('auth');
//destroy method
Route::get('/gestionnaires/delete/{gestionnaire}', [GestionnaireContoller::class, 'destroy'])->name('admin.delete')->middleware('auth');

require __DIR__.'/auth.php';
