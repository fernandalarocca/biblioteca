<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'author_id',
        'book_id',
        'quantity'
    ];
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
