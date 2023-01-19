<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;

class BookController extends Controller
{
    public function list(){
        
        $items = Book::orderBy('name', 'asc')->get();

        return view(
            'book.list',
            [
                'title' => 'Grāmatas',
                'items' => $items
            ]
        );
    }
    

    public function create(){
     $authors = Author::orderBy('name', 'asc')->get();
     $genres = Genre::orderBy('name', 'asc')->get();
        return view(
            'book.form',
            [
                'title' => 'Pievienot grāmatu',
                'book' => new Book(),
                // priekš dropdown ar autoriem
                'authors' => $authors,
                'genres' => $genres,
            ]
        );
    }
    
    public function put(Request $request){

        
        $book = new Book();
        $this->saveBookData($book, $request);

        return redirect('/books');
    }
    public function update(Book $book){
        
        $authors = Author::orderBy('name', 'asc')->get();
        $genres = Genre::orderBy('name', 'asc')->get();
        
        return view(
            'book.form',
            [
                'title' => 'Rediģēt grāmatu',
                'book' => $book,
                'authors' => $authors,
                'genres' => $genres,
            ]);
    }
    public function patch(Book $book, Request $request){
        
        $this->saveBookData($book, $request);   
        return redirect('/books');
    }
    public function delete(Book $book){
        $book->delete();
        return redirect('/books');
    }

    private function saveBookData(Book $book, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:256',
            'idauthor' => 'required',
            'idgenre' => 'required',
            'description' => 'nullable',
            'price' => 'nullable|numeric',
            'year' => 'numeric',
            'image' => 'nullable|image',
            'display' => 'nullable'
        ]);

        // piešķir book tās key vērtības kuras atrodas Models/Book $fillable mainīgā
        $book->fill($validatedData);
        $book->image = ($validatedData['image'] ?? $book->image);
        $book->display = (bool) ($validatedData['display'] ?? false);

        if ($request->hasFile('image')) {
        $uploadedFile = $request->file('image');
        $extension = $uploadedFile->clientExtension();
        $name = uniqid();
        $book->image = $uploadedFile->storePubliclyAs(
        '/',
        $name . '.' . $extension,
        'uploads'
        );
        }
        $book->save();
    }


}
