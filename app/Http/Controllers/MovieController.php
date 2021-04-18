<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Movie;
use Illuminate\Support\Facades\Redirect;


class MovieController extends Controller
{

    public function index()
    {
        $movies = Movie::orderBy('movie_ID', 'DESC')->get();
        foreach($movies as $movie){
            $movie->genre;
            $movie->certificate;
        }
        return response()->json([
            'success' => true,
            'movies' => $movies
        ]);
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

        if($request->movie_poster != ''){
         
            $movie_poster = time().'.jpg';
            file_put_contents('storage/posts/'.$movie_poster,base64_decode($request->movie_poster));
            $movie->movie_poster = $movie_poster;
        }

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
		return Response::json($movie, 200);
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);
        $movie = $movie->update($request->all());
        return Response::json($movie, 200);
    }

    public function destroy($id)
    {
		$movie = Movie::findOrFail($id);
        $movie->delete();
        $data = array('status' => 'Deleted');
        return Response::json($data, 200);
    }

	public function restore($id)
	{
		Movie::withTrashed()->where('movie_ID',$id)->restore();
		return Redirect::route('movie.index')->with('success','Movie Restored Successfully!');
	}
}
