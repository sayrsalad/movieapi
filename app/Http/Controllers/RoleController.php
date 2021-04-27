<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('role_ID', 'DESC')->get();
        return response()->json([
            'success' => true,
            'roles' => $roles
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $role = Role::create($request->all());
        return Response::json($role, 200);
    }

    public function show($id)
    {
        $role = Role::find($id);
        return Response::json($role, 200);
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return Response::json($role, 200);
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role = $role->update($request->all());
        return Response::json($role, 200);
    }

    public function destroy($id)
    {
		$role = Role::findOrFail($id);
        $role->delete();
        $data = array('status' => 'Deleted');
        return Response::json($data, 200);
    }
}
