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


Route::get('/list', function () {
    $noticias = Noticia::paginate(6);
    return view('noticias.list', compact('noticias'));
})->middleware(RangoAltoMiddleware::class);


Route::get('noticias/create', 'NoticiaController@create')->name('noticias.create')->middleware(RangoAltoMiddleware::class);
Route::post('noticias', 'NoticiaController@store')->name('noticias.store')->middleware(RangoAltoMiddleware::class);
Route::get('noticias/{noticia}/edit', 'NoticiaController@edit')->name('noticias.edit')->middleware(RangoAltoMiddleware::class);
Route::put('noticias/{noticia}', 'NoticiaController@update')->name('noticias.update')->middleware(RangoAltoMiddleware::class);
Route::delete('noticias/{noticia}', 'NoticiaController@destroy')->name('noticias.destroy')->middleware(RangoAltoMiddleware::class);


Route::get('noticias/{noticia}', 'NoticiaController@show')->name('noticias.show');
Route::get('noticias', 'NoticiaController@index')->name('noticias.index');
Route::resource('noticias', NoticiaController::class);







Route::fallback(function () {
    return redirect('/');
});
