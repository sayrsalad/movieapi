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
        //
    }

    public function show($id)
    {
        $producer = Producer::find($id);
        return Response::json($producer, 200);
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
