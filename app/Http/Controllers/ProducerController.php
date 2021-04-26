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
        return response()->json([
            'success' => true,
            'producers' => $producers
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $producer = new Producer;

        $producer->producer_name = $request->producer_name;
        $producer->producer_email_address = $request->producer_email_address;
        $producer->producer_website = $request->producer_website;
        $producer->producer_status = $request->producer_status;

        $producer->save();

        return response()->json([
            'success' => true,
            'producer' => $producer
        ]);
    }

    public function show($id)
    {
        $producer = Producer::find($id);
        return Response::json($producer, 200);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $producer = Producer::find($id);

        $producer->producer_name = $request->producer_name;
        $producer->producer_email_address = $request->producer_email_address;
        $producer->producer_website = $request->producer_website;
        $producer->producer_status = $request->producer_status;


        $producer->update();

        return response()->json([
            'success' => true,
            'producer' => $producer,
            'message' => 'Producer Edited'
        ]);
    }

    public function destroy($id)
    {
		$producer = Producer::findOrFail($id);
        $producer->delete();
        $data = array('status' => 'Deleted');
        return response()->json([
            'success' => true,
            'message' => 'Producer Deleted'
        ]);
    }

    public function restore($id)
    {
        Producer::withTrashed()->where('producer_ID',$id)->restore();
        $data = array('status' => 'Restored');
        return Response::json($data, 200);
    }
}
