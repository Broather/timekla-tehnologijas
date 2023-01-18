<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function list(){
        // ņemts no app\models\Author
        $items = Author::orderBy('name', 'asc')->get();
        return view(
            // views/author/list.blade.php
            'author.list',
            [
                'title' => 'Autori',
                'items' => $items
            ]
        );
    }

    public function create()
    {
        return view(
            'author.form', 
            [
                'title' => 'Pievienot autoru'
                'author' => new Author()
            ]
        );
    }
    public function put(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $author = new Author();
        $author->name = $validatedData['name'];
        $author->save();

        return redirect('/authors');
    }
    public function update(Author $author)
    {
        return view(
        'author.form',
        [
            'title' => 'Rediģēt autoru',
            'author' => $author
        ]
        );
    }
    // how does it know to send over author along with form data?
    public function patch(Author $author, Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required',
        ]);
        $author->name = $validatedData['name'];
        $author->save();
        return redirect('/authors');
    }
}
