<?php

namespace App\Http\Controllers\Book;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{
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
     * @param Request $request
     * @param $id
     * @return string
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
