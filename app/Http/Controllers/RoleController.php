<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::orderBy('role_ID', 'DESC')->get();
        return Response::json($role, 200);
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
        $roles = Role::find($id);
        return Response::json($roles, 200);
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
