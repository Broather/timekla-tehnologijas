<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\Genre;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'idauthor', 'idgenre', 'description', 'price', 'year'];
    // izsauc ar $book->author
    public function author()
    {
        return $this->belongsTo(Author::class, 'idauthor');
    }
    // izsauc ar $book->genre
    public function genre()
    {
        return $this->belongsTo(Genre::class, 'idgenre');
    }

}
