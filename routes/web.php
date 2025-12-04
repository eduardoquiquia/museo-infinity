<?php

use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Web\ContactoController;
use App\Http\Controllers\Web\ExhibicionController;
use App\Http\Controllers\Web\SalaVirtualController;
use App\Http\Controllers\Web\EventoController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\PerfilController;
use App\Http\Controllers\Web\RestauranteController;
use Illuminate\Support\Facades\Route;

// Web Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/exhibiciones', [ExhibicionController::class, 'index'])->name('exhibiciones');
Route::get('/exhibiciones/{slug}', [ExhibicionController::class, 'show'])->name('exhibiciones.show');
Route::get('/eventos', [EventoController::class, 'index'])->name('eventos');
Route::get('/restaurante', [RestauranteController::class, 'index'])->name('restaurante');
Route::get('/salas-virtuales', [SalaVirtualController::class, 'index'])->name('salas-virtuales');
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil');

// Static Pages
Route::view('/sobre-nosotros', 'web.nosotros-page')->name('sobre-nosotros');

// Admin Routes
Route::get('/panel', [PanelController::class, 'index'])->name('panel');