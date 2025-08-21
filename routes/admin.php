<?php

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EquipoController;
use App\Http\Controllers\Admin\GeneroController;
use App\Http\Controllers\Admin\JugadoreController;
use App\Http\Controllers\Admin\NoticiaController;
use App\Http\Controllers\Admin\PartidoController;
use App\Http\Controllers\Admin\PatrocinadoreController;
use App\Http\Controllers\Admin\PatrocinadorTipoController;
use App\Http\Controllers\Admin\PosicioneController;
use App\Http\Controllers\Admin\RoleController;
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

/* Route::get('/', function () {
    return view('auth.login');
}); */

//Auth::routes();

Route::get('/', [DashboardController::class, 'index'])->name('home');

//Roles
Route::get('/roles', [RoleController::class, 'index'])->middleware('auth')->name('roles.index');
Route::get('/roles/crear', [RoleController::class, 'create'])->middleware('auth')->name('roles.create');
Route::post('/roles/almacenar', [RoleController::class, 'store'])->middleware('auth')->name('roles.store');
Route::get('/roles/{role}/ver', [RoleController::class, 'show'])->middleware('auth')->name('roles.show');
Route::get('/roles/{role}/editar', [RoleController::class, 'edit'])->middleware('auth')->name('roles.edit');
Route::put('/roles/{role}/actualizar', [RoleController::class, 'update'])->middleware('auth')->name('roles.update');
Route::delete('/roles/{role}/delete', [RoleController::class, 'destroy'])->middleware('auth')->name('roles.destroy');

//Posiciones
Route::get('/posiciones', [PosicioneController::class, 'index'])->middleware('auth')->name('posiciones.index');
Route::get('/posiciones/crear', [PosicioneController::class, 'create'])->middleware('auth')->name('posiciones.create');
Route::post('/posiciones/almacenar', [PosicioneController::class, 'store'])->middleware('auth')->name('posiciones.store');
Route::get('/posiciones/{posicione}/ver', [PosicioneController::class, 'show'])->middleware('auth')->name('posiciones.show');
Route::get('/posiciones/{posicione}/editar', [PosicioneController::class, 'edit'])->middleware('auth')->name('posiciones.edit');
Route::put('/posiciones/{posicione}/actualizar', [PosicioneController::class, 'update'])->middleware('auth')->name('posiciones.update');
Route::delete('/posiciones/{posicione}/delete', [PosicioneController::class, 'destroy'])->middleware('auth')->name('posiciones.destroy');

//Categorías
Route::get('/categorias', [CategoriaController::class, 'index'])->middleware('auth')->name('categorias.index');
Route::get('/categorias/crear', [CategoriaController::class, 'create'])->middleware('auth')->name('categorias.create');
Route::post('/categorias/almacenar', [CategoriaController::class, 'store'])->middleware('auth')->name('categorias.store');
Route::get('/categorias/{categoria}/ver', [CategoriaController::class, 'show'])->middleware('auth')->name('categorias.show');
Route::get('/categorias/{categoria}/editar', [CategoriaController::class, 'edit'])->middleware('auth')->name('categorias.edit');
Route::put('/categorias/{categoria}/actualizar', [CategoriaController::class, 'update'])->middleware('auth')->name('categorias.update');
Route::delete('/categorias/{categoria}/delete', [CategoriaController::class, 'destroy'])->middleware('auth')->name('categorias.destroy');

//Géneros
Route::get('/generos', [GeneroController::class, 'index'])->middleware('auth')->name('generos.index');
Route::get('/generos/crear', [GeneroController::class, 'create'])->middleware('auth')->name('generos.create');
Route::post('/generos/almacenar', [GeneroController::class, 'store'])->middleware('auth')->name('generos.store');
Route::get('/generos/{genero}/ver', [GeneroController::class, 'show'])->middleware('auth')->name('generos.show');
Route::get('/generos/{genero}/editar', [GeneroController::class, 'edit'])->middleware('auth')->name('generos.edit');
Route::put('/generos/{genero}/actualizar', [GeneroController::class, 'update'])->middleware('auth')->name('generos.update');
Route::delete('/generos/{genero}/delete', [GeneroController::class, 'destroy'])->middleware('auth')->name('generos.destroy');

//Equipos
Route::get('/equipos', [EquipoController::class, 'index'])->middleware('auth')->name('equipos.index');
Route::get('/equipos/crear', [EquipoController::class, 'create'])->middleware('auth')->name('equipos.create');
Route::post('/equipos/almacenar', [EquipoController::class, 'store'])->middleware('auth')->name('equipos.store');
Route::get('/equipos/{equipo}/ver', [EquipoController::class, 'show'])->middleware('auth')->name('equipos.show');
Route::get('/equipos/{equipo}/editar', [EquipoController::class, 'edit'])->middleware('auth')->name('equipos.edit');
Route::put('/equipos/{equipo}/actualizar', [EquipoController::class, 'update'])->middleware('auth')->name('equipos.update');
Route::delete('/equipos/{equipo}/delete', [EquipoController::class, 'destroy'])->middleware('auth')->name('equipos.destroy');

//Partidos
Route::get('/partidos', [PartidoController::class, 'index'])->middleware('auth')->name('partidos.index');
Route::get('/partidosSinResultados', [PartidoController::class, 'indexSinResultados'])->middleware('auth')->name('partidosSinResultados.index');
Route::get('/partidos/crear', [PartidoController::class, 'create'])->middleware('auth')->name('partidos.create');
Route::post('/partidos/almacenar', [PartidoController::class, 'store'])->middleware('auth')->name('partidos.store');
Route::get('/partidos/{partido}/ver', [PartidoController::class, 'show'])->middleware('auth')->name('partidos.show');
Route::get('/partidos/{partido}/editar', [PartidoController::class, 'edit'])->middleware('auth')->name('partidos.edit');
Route::put('/partidos/{partido}/actualizar', [PartidoController::class, 'update'])->middleware('auth')->name('partidos.update');
Route::delete('/partidos/{partido}/delete', [PartidoController::class, 'destroy'])->middleware('auth')->name('partidos.destroy');

//Jugadores
Route::get('/jugadores', [JugadoreController::class, 'index'])->middleware('auth')->name('jugadores.index');
Route::get('/jugadores/crear', [JugadoreController::class, 'create'])->middleware('auth')->name('jugadores.create');
Route::post('/jugadores/almacenar', [JugadoreController::class, 'store'])->middleware('auth')->name('jugadores.store');
Route::get('/jugadores/{jugadore}/ver', [JugadoreController::class, 'show'])->middleware('auth')->name('jugadores.show');
Route::get('/jugadores/{jugadore}/editar', [JugadoreController::class, 'edit'])->middleware('auth')->name('jugadores.edit');
Route::put('/jugadores/{jugadore}/actualizar', [JugadoreController::class, 'update'])->middleware('auth')->name('jugadores.update');
Route::delete('/jugadores/{jugadore}/delete', [JugadoreController::class, 'destroy'])->middleware('auth')->name('jugadores.destroy');

//Tipos de Patrocinadores
Route::get('/patrocinadorestipos', [PatrocinadorTipoController::class, 'index'])->middleware('auth')->name('patrocinador-tipos.index');
Route::get('/patrocinadorestipos/crear', [PatrocinadorTipoController::class, 'create'])->middleware('auth')->name('patrocinador-tipos.create');
Route::post('/patrocinadorestipos/almacenar', [PatrocinadorTipoController::class, 'store'])->middleware('auth')->name('patrocinador-tipos.store');
Route::get('/patrocinadorestipos/{patrocinadortipo}/ver', [PatrocinadorTipoController::class, 'show'])->middleware('auth')->name('patrocinador-tipos.show');
Route::get('/patrocinadorestipos/{patrocinadortipo}/editar', [PatrocinadorTipoController::class, 'edit'])->middleware('auth')->name('patrocinador-tipos.edit');
Route::put('/patrocinadorestipos/{patrocinadortipo}/actualizar', [PatrocinadorTipoController::class, 'update'])->middleware('auth')->name('patrocinador-tipos.update');
Route::delete('/patrocinadorestipos/{patrocinadortipo}/delete', [PatrocinadorTipoController::class, 'destroy'])->middleware('auth')->name('patrocinador-tipos.destroy');

//Patrocinadores
Route::get('/patrocinadores', [PatrocinadoreController::class, 'index'])->middleware('auth')->name('patrocinadores.index');
Route::get('/patrocinadores/crear', [PatrocinadoreController::class, 'create'])->middleware('auth')->name('patrocinadores.create');
Route::post('/patrocinadores/almacenar', [PatrocinadoreController::class, 'store'])->middleware('auth')->name('patrocinadores.store');
Route::get('/patrocinadores/{patrocinadore}/ver', [PatrocinadoreController::class, 'show'])->middleware('auth')->name('patrocinadores.show');
Route::get('/patrocinadores/{patrocinadore}/editar', [PatrocinadoreController::class, 'edit'])->middleware('auth')->name('patrocinadores.edit');
Route::put('/patrocinadores/{patrocinadore}/actualizar', [PatrocinadoreController::class, 'update'])->middleware('auth')->name('patrocinadores.update');
Route::delete('/patrocinadores/{patrocinadore}/delete', [PatrocinadoreController::class, 'destroy'])->middleware('auth')->name('patrocinadores.destroy');

//Noticias
Route::get('/noticias', [NoticiaController::class, 'index'])->middleware('auth')->name('noticias.index');
Route::get('/noticias/crear', [NoticiaController::class, 'create'])->middleware('auth')->name('noticias.create');
Route::post('/noticias/almacenar', [NoticiaController::class, 'store'])->middleware('auth')->name('noticias.store');
Route::get('/noticias/{noticia}/ver', [NoticiaController::class, 'show'])->middleware('auth')->name('noticias.show');
Route::get('/noticias/{noticia}/editar', [NoticiaController::class, 'edit'])->middleware('auth')->name('noticias.edit');
Route::put('/noticias/{noticia}/actualizar', [NoticiaController::class, 'update'])->middleware('auth')->name('noticias.update');
Route::delete('/noticias/{noticia}/delete', [NoticiaController::class, 'destroy'])->middleware('auth')->name('noticias.destroy');

//Temporadas
Route::get('/temporadas', [App\Http\Controllers\TemporadaController::class, 'index'])->middleware('auth')->name('temporada.index');
Route::get('/temporadas/crear', [App\Http\Controllers\TemporadaController::class, 'create'])->middleware('auth')->name('temporada.create');
Route::post('/temporadas/almacenar', [App\Http\Controllers\TemporadaController::class, 'store'])->middleware('auth')->name('temporada.store');
Route::get('/temporadas/{temporada}/ver', [App\Http\Controllers\TemporadaController::class, 'show'])->middleware('auth')->name('temporada.show');
Route::get('/temporadas/{temporada}/editar', [App\Http\Controllers\TemporadaController::class, 'edit'])->middleware('auth')->name('temporada.edit');
Route::put('/temporadas/{temporada}/actualizar', [App\Http\Controllers\TemporadaController::class, 'update'])->middleware('auth')->name('temporada.update');
Route::delete('/temporadas/{temporada}/delete', [App\Http\Controllers\TemporadaController::class, 'destroy'])->middleware('auth')->name('temporada.destroy');