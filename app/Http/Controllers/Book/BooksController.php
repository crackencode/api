<?php

namespace App\Http\Controllers\Book;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{
    /**
     * BooksController constructor.
     */
    public function __construct()
    {
        //Cabecera necesaria para permitir consumir la API desde Angular

        header('Access-Control-Allow-Origin: *');
    }

    /**
     * Muestra todos los libros
     *
     * @return string
     */
    public function index()
    {
        return Book::all()->toJson();
    }

    /**
     *
     */
    public function create()
    {
        //
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Muestra un libro concreto
     *
     * @param $id
     *
     * @return string
     */
    public function show($id)
    {
        $book = Book::find($id);

        return json_encode($book);
    }

    /**
     * Muestra un libro concreto
     *
     * @param $id
     * @return false|string
     */
    function edit($id)
    {
        $book = Book::find($id);

        return json_encode($book);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        //
    }
}
