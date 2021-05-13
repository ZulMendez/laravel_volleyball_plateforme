<?php

use App\Http\Controllers\AllController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\JoueurController;
use App\Models\Equipe;
use App\Models\Joueur;
use Illuminate\Support\Facades\Route;

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

// FRONT (coté client)
Route::get('/', [AllController::class, 'home'])->name('home');
Route::get('/equipes', [AllController::class, 'equipes'])->name('equipes');
Route::get('/equipes/{equipe}/show', [AllController::class, 'showEquipe'])->name('showEquipe');
Route::get('/joueurs', [AllController::class, 'joueurs'])->name('joueurs');
Route::get('/joueurs/{joueur}/show', [AllController::class, 'showJoueur'])->name('showJoueur');
Route::get('/admin', [AllController::class, 'admin'])->name('admin');

// BACK (coté serveur)
Route::resource('/admin/equipe', EquipeController::class);
Route::resource('/admin/joueur', JoueurController::class);

