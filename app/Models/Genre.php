<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Genre extends Model
{
    use HasFactory;
     // izsauc ar $author->books
     public function books()
     {
         return $this->hasMany(Book::class);
     }
}
