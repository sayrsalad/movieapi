<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Certificate;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::orderBy('certificate_ID', 'DESC')->get();
        return response()->json([
            'success' => true,
            'certificates' => $certificates
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $certificate = Certificate::create($request->all());
        return Response::json($certificate, 200);
    }

    public function show($id)
    {
        $certificate = Certificate::find($id);
        return Response::json($certificate, 200);
    }

    public function edit($id)
    {
        $certificate = Certificate::find($id);
        return Response::json($certificate, 200);
    }

    public function update(Request $request, $id)
    {
        $certificate = Certificate::find($id);
        $certificate = $certificate->update($request->all());
        return Response::json($certificate, 200);
    }

    public function destroy($id)
    {
		$certificate = Certificate::findOrFail($id);
        $certificate->delete();
        $data = array('status' => 'Deleted');
        return Response::json($data, 200);
    }
}
