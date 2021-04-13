<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Producer;

class ProducerController extends Controller
{
    public function index()
    {
        $producers = Producer::orderBy('producer_ID', 'DESC')->get();
        return Response::json($producers, 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $producer = Producer::create($request->all());
        return Response::json($producer, 200);
    }

    public function show($id)
    {
        $producer = Producer::find($id);
        return Response::json($producer, 200);
    }

    public function edit($id)
    {
        $producer = Producer::find($id);
        return Response::json($producer, 200);
    }

    public function update(Request $request, $id)
    {
        $producer = Producer::find($id);
        $producer = $producer->update($request->all());
        return Response::json($producer, 200);
    }

    public function destroy($id)
    {
		$producer = Producer::findOrFail($id);
        $producer->delete();
        $data = array('status' => 'Deleted');
        return Response::json($data, 200);
    }
}
