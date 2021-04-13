<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Certificate;
use Illuminate\Support\Facades\Redirect;


class MovieController extends Controller
{

    public function index()
    {
        $movies = Movie::orderBy('movie_ID', 'DESC')->get();
        $genres = Genre::orderBy('genre_ID', 'DESC')->get();
        $certificates = Certificate::orderBy('certificate_ID', 'DESC')->get();
        $result = array('movies' => $movies, 'genres' => $genres, 'certificates' => $certificates);
        return response()->json($result);
    }

    public function create()
    {
        // $genres = Genre::pluck('genre_name', 'genre_ID');
        // $certificates = Certificate::pluck('certificate_name', 'certificate_ID');
        // return View::make('movie.create', compact('genres', 'certificates'));
    }

    public function store(Request $request)
    {
        $movie = Movie::create($request->all());
        return Response::json($movie, 200);
    }

    public function show($id)
    {
        $movie = Movie::find($id);
        return Response::json($movie, 200);
    }

    public function edit($id)
    {
        $movie = Movie::find($id);
		return response()->json($movie);
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);
        $movie = $movie->update($request->all());
        return response()->json($movie);
    }

    public function destroy($id)
    {
		$movie = Movie::findOrFail($id);
        $movie->delete();
        return response()->json(["success" => "Movie Deleted Successfully.",
             "data" => $movie,"status" => 200]);
    }

	public function restore($id)
	{
		Movie::withTrashed()->where('movie_ID',$id)->restore();
		return Redirect::route('movie.index')->with('success','Movie Restored Successfully!');
	}
}
