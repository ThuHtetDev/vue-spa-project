<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['isbn','shelf_id','book_title','review','author','book_image','is_rent'];

    public function shelf(){
        return $this->belongsTo('App\BookShelf');
    }
}
