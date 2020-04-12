<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookShelf extends Model
{
    protected $table = 'book_shelf';
    protected $fillable = ["shelf_name","about","image"];

    public function books(){
        return $this->hasMany('App\Book', 'shelf_id', 'id');
    }
}
