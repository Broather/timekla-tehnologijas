<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;

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
    

    public function create()
    {
     $authors = Author::orderBy('name', 'asc')->get();
        return view(
            'book.form',
            [
                'title' => 'Pievienot grāmatu',
                'book' => new Book(),
                // priekš dropdown ar autoriem
                'authors' => $authors,
            ]
        );
    }
    
    public function put(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:256',
            'idauthor' => 'required',
            'description' => 'nullable',
            'price' => 'nullable|numeric',
            'year' => 'numeric',
            // 'image' => 'nullable|image',
            'display' => 'nullable'
            ]);
            
        $book = new Book();
        $book->name = $validatedData['name'];
        $book->idauthor = $validatedData['idauthor'];
        $book->description = $validatedData['description'];
        $book->price = $validatedData['price'];
        $book->year = $validatedData['year'];
        // $book->image = $validatedData['image'];
        $book->display = $validatedData['display'];

        $book->save();

        return redirect('/books');
    }
    public function update(book $book)
    {
        return view(
        'book.form',
        [
            'title' => 'Rediģēt autoru',
            'book' => $book
        ]
        );
    }
    // how does it know to send over book along with form data?
    public function patch(book $book, Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required',
        ]);
        $book->name = $validatedData['name'];
        // TODO: and other parameters
        $book->save();
        return redirect('/books');
    }
    public function delete(book $book)
    {
        $book->delete();
        return redirect('/books');
    }
}
