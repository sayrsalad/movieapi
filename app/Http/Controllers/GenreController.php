<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::orderBy('genre_ID', 'ASC')->get();
        return Response::json($genres, 200);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $genre = Genre::find($id);
        return Response::json($genre, 200);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
