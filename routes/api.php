<?php

use Illuminate\Http\Request;

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
// Utilizamos un middleware para habilitar CORS
Route::group(['middleware' => 'cors'], function()
{
    Route::Resource('/books', 'Book\BooksController', [
        'except' => ['edit', 'create']
    ]);
});