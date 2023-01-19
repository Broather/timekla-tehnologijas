<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function list(){
        // ņemts no app\models\genre
        $items = Genre::orderBy('name', 'asc')->get();
        return view(
            // views/genre/list.blade.php
            'genre.list',
            [
                'title' => 'Žanri',
                'items' => $items
            ]
        );
    }

    public function create()
    {
        return view(
            'genre.form', 
            [
                'title' => 'Pievienot žanru',
                'genre' => new genre()
            ]
        );
    }
    public function put(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $genre = new Genre();
        $genre->name = $validatedData['name'];
        $genre->save();

        return redirect('/genres');
    }
    public function update(Genre $genre)
    {
        return view(
        'genre.form',
        [
            'title' => 'Rediģēt žanru',
            'genre' => $genre
        ]
        );
    }
    // how does it know to send over genre along with form data?
    public function patch(genre $genre, Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required',
        ]);
        $genre->name = $validatedData['name'];
        $genre->save();
        return redirect('/genres');
    }
    public function delete(genre $genre)
    {
        $genre->delete();
        return redirect('/genres');
    }
}
