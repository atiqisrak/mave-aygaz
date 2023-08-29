<?php

namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return response()->json($roles);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:roles|max:255',
            ]);
    
            Role::create([
                'name' => $request->input('name'),
            ]);
            return response()->json([
                'message' => 'Role created successfully.'
            ]);
        
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Role creation failed.' . $e->getMessage()
            ]);
        }
    }

    public function assignPermissions(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'required|array',
        ]);

        $role = Role::findOrFail($request->input('role_id'));
        $permissions = $request->input('permissions');

        $role->permissions()->sync($permissions);

        return response()->json(['message' => 'Permissions assigned to role successfully'], 200);
    }

    public function update(Request $request, Role $role)
    {
        $request -> validate([
            'name' => 'required|unique:roles'
        ]);

        $role->update([
            'name' => $request->name
        ]);

        return response()->json([
            'message' => 'Role updated successfully.'
        ]);
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json([
            'message' => 'Role deleted successfully.'
        ]);
    }
}
