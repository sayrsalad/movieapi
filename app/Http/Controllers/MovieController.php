<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Movie;
use App\Models\MovieActorRole;
use Illuminate\Support\Facades\Redirect;


class MovieController extends Controller
{

    public function index()
    {
        $movies = Movie::orderBy('movie_ID', 'DESC')->get();
        foreach($movies as $movie){
            $movie->genre;
            $movie->certificate;
            $movie->actor;
            $movie->producer;
        }
        return response()->json([
            'success' => true,
            'movies' => $movies
        ]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $movie = new Movie;
        $movie->movie_title = $request->movie_title;
        $movie->movie_story = $request->movie_story;
        $movie->movie_release_date = $request->movie_release_date;
        $movie->movie_film_duration = $request->movie_film_duration;
        $movie->movie_additional_info = $request->movie_additional_info;
        $movie->genre_ID = $request->genre_ID;
        $movie->certificate_ID = $request->certificate_ID;
        $movie->movie_status = $request->movie_status;

        if($request->movie_poster != ''){
         
            $movie_poster = $this->setImgName($movie->movie_title)."_".time().'.jpg';
            file_put_contents('storage/posters/'.$movie_poster,base64_decode($request->movie_poster));
            $movie->movie_poster = $movie_poster;
        }

        $movie->save();

        $movie->genre;
        $movie->certificate;
        $movie->actor;
        $movie->producer;

        return response()->json([
            'success' => true,
            'message' => 'Movie Added',
            'movie' => $movie
        ]);
    }

    public function show($id)
    {
        $movie = Movie::find($id);
        foreach ($movie->actor as $actor) {
            
        }
        return Response::json($movie, 200);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);
        $movie->movie_title = $request->movie_title;
        $movie->movie_story = $request->movie_story;
        $movie->movie_release_date = $request->movie_release_date;
        $movie->movie_film_duration = $request->movie_film_duration;
        $movie->movie_additional_info = $request->movie_additional_info;
        $movie->genre_ID = $request->genre_ID;
        $movie->certificate_ID = $request->certificate_ID;
        $movie->movie_status = $request->movie_status;

        if($request->movie_poster != ''){
         
            $movie_poster = $this->setImgName($movie->movie_title)."_".time().'.jpg';
            file_put_contents('storage/posters/'.$movie_poster,base64_decode($request->movie_poster));
            $movie->movie_poster = $movie_poster;
        }

        $movie->update();

        $movie->genre;
        $movie->certificate;
        $movie->actor;
        $movie->producer;

        return response()->json([
            'success' => true,
            'movie' => $movie,
            'message' => 'Movie Edited'
        ]);
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return response()->json([
            'success' => true,
            'message' => 'Actor Deleted'
        ]);
    }

	public function restore($id)
	{
        Movie::withTrashed()->where('movie_ID',$id)->restore();
        $data = array('status' => 'Restored');
        return Response::json($data, 200);
	}

    public function addActorRole(Request $request)
    {
        $movieactorrole = new MovieActorRole;

        $movieactorrole->movie_ID = $request->movie_ID;
        $movieactorrole->actor_ID = $request->actor_ID;
        $movieactorrole->role_ID = $request->role_ID;
        $movieactorrole->character_name = $request->character_name;

        $movieactorrole->save();

        return response()->json([
            'success' => true,
            'movieactorrole' => $movieactorrole
        ]);
    }

    public function setImgName($name) {
        return strtolower(preg_replace("/[^a-zA-Z0-9]+/", "", $name));
    }
}
