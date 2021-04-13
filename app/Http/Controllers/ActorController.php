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
        return Response::json($actors, 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $actor = Actor::find($id);
        return Response::json($actor, 200);
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
