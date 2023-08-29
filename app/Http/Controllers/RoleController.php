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

    public function create()
    {
        return view('roles.create');
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

    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request -> validate([
            'name' => 'required|unique:roles'
        ]);

        $role->update([
            'name' => $request->name
        ]);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }

    public function attachPermissions(Request $request, Role $role)
    {
        $permissions = $request->input('permissions', []);
        
        $role->permissions()->sync($permissions);

        return redirect()->route('roles.index')->with('success', 'Permissions attached successfully.');
    }
}
