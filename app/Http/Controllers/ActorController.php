<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Actor;

class ActorController extends Controller
{
    public function index()
    {
        $actors = Actor::orderBy('actor_ID', 'DESC')->get();
        foreach($actors as $actor){
            $actor->movie;
        }
        return response()->json([
            'success' => true,
            'actors' => $actors
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $actor = new Actor;
        $actor->actor_fname = $request->actor_fname;
        $actor->actor_lname = $request->actor_lname;
        $actor->actor_notes = $request->actor_notes;
        $actor->actor_status = $request->actor_status;

        if($request->actor_img != ''){
         
            $actor_img = $this->setImgName($actor->actor_fname.$actor->actor_lname)."_".time().'.jpg';
            file_put_contents('storage/actor_profiles/'.$actor_img,base64_decode($request->actor_img));
            $actor->actor_img = $actor_img;
        }


        $actor->save();

        $actor->movie;

        return response()->json([
            'success' => true,
            'message' => 'Actor Added',
            'actor' => $actor
        ]);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $actor = Actor::find($id);
        $actor->actor_fname = $request->actor_fname;
        $actor->actor_lname = $request->actor_lname;
        $actor->actor_notes = $request->actor_notes;
        $actor->actor_status = $request->actor_status;

        if($request->actor_img != ''){
         
            $actor_img = $this->setImgName($actor->actor_fname.$actor->actor_lname)."_".time().'.jpg';
            file_put_contents('storage/actor_profiles/'.$actor_img,base64_decode($request->actor_img));
            $actor->actor_img = $actor_img;
        }

        $actor->update();

        $actor->movie;

        return response()->json([
            'success' => true,
            'message' => 'Actor Updated',
            'actor' => $actor
        ]);
    }

    public function destroy($id)
    {
		$actor = Actor::findOrFail($id);
        $actor->delete();
        $data = array('success' => true, 'status' => 'Deleted');
        return Response::json($data, 200);
    }

    public function restore($id)
    {
        Actor::withTrashed()->where('actor_ID',$id)->restore();
        $data = array('status' => 'Restored');
        return Response::json($data, 200);
    }

    public function setImgName($name) {
        return strtolower(preg_replace("/[^a-zA-Z0-9]+/", "", $name));
    }
}
