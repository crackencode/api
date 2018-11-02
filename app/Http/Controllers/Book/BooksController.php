<?php

namespace App\Http\Controllers\Book;

use App\Book;
use App\Rules\ISBN;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BooksController extends Controller
{
    private $book;

    public function __construct()
    {
        $this->book = Book::all();
    }

    /**
     * Muestra todos los libros
     *
     * @return string
     */
    public function index()
    {
        return $this->book->toJson();
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
        $book = $this->book->find($id);

        return json_encode($book);
    }

    /**
     * @param Request $request
     * @param $id
     * @return false|\Illuminate\Http\JsonResponse|string
     */
    public function update(Request $request, $id)
    {
        // Validamos el formulario en el lado servidor
        $validator = Validator::make($request->all(), $this->getRules());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        // Buscamos el libro que se quiere actualizar
        $book = $this->book->find($id);

        // Update de los datos
        $book->autor = $request->input('autor');
        $book->title = $request->input('title');
        $book->ISBN = str_replace("-", "", $request->input('ISBN'));
        $book->publication_date = $request->input('publication_date');

        // Guardamos los nuevos datos y los devolvemos actualizados
        if ($book->save()) {
            $bookUpdate = $this->book->find($id);

            return json_encode($bookUpdate);
        }

        // Si no se han actualizado los datos, devolvemos un error
        return json_encode(['errors' => 'Error al actualizar el registro']);
    }

    /**
     * @param $id
     * @return false|string
     * @throws \Exception
     */
    public function destroy($id)
    {
        $book = $this->book->find($id);
        $delete = $book->delete();

        return json_encode($delete);
    }

    /**
     * @return array
     */
    private function getRules(): array
    {
        $tomorrow = new \DateTime('tomorrow');

        // Reglas de validación para libros
        return [
            'autor' => [
                'required',
                'min:3',
                'max:50'
            ],
            'title' => [
                'required',
                'min:1',
                'max:100'
            ],
            'ISBN' => [
                'required',
                new ISBN()
            ],
            'publication_date' => [
                'required',
                'date',
                'date_format:Y-m-d',
                'before:' . $tomorrow->format('Y-m-d')
            ],
        ];
    }
}
