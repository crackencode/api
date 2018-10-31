<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    /**
     * Busca en la BBDD un libro con id especifico
     *
     * @param $id
     * @return Model|\Illuminate\Database\Query\Builder|null|object
     */
    public static function find($id)
    {
        return
            DB::table('books')
            ->where('id', '=', $id)
            ->first();
    }
}
