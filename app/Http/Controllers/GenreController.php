<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::orderBy('genre_ID', 'DESC')->get();
        return response()->json([
            'success' => true,
            'genres' => $genres
        ]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $genre = Genre::create($request->all());
        return Response::json($genre, 200);
    }

    public function show($id)
    {
        $genre = Genre::find($id);
        return Response::json($genre, 200);
    }

    public function edit($id)
    {
        $genre = Genre::find($id);
        return Response::json($genre, 200);
    }

    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);
        $genre = $genre->update($request->all());
        return Response::json($genre, 200);
    }

    public function destroy($id)
    {
		$genre = Genre::findOrFail($id);
        $genre->delete();
        $data = array('status' => 'Deleted');
        return Response::json($data, 200);
    }
}
