<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    //
    protected $fillable = ['reader_id', 'book_id', 'borrow_date', 'return_date'];
    public function reader()
    {
        return $this->belongsTo(Reader::class, 'reader_id');
    }
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
