<?php

use App\Http\Controllers\EnserController;
use App\Http\Controllers\NoticiaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TronoController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\RangoAltoMiddleware;
use App\Models\Noticia;

Route::get('/', function () {
    return view('dashboard');
})->name('inicio');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('ensers', EnserController::class)->middleware(RangoAltoMiddleware::class);
    Route::resource('tronos', TronoController::class)->middleware(RangoAltoMiddleware::class);
    Route::resource('users', UserController::class)->middleware(AdminMiddleware::class);
});
Route::resource('noticias', NoticiaController::class);
Route::get('/list', function(){
    $noticias = Noticia::paginate(4);
    return view('noticias.list', compact('noticias'));
});






Route::fallback(function () {
    return redirect('/');
});
