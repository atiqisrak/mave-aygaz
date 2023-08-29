<?php

namespace App\Http\Controllers;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return response()->json($permissions);
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:permissions|max:255',
            ]);
    
            Permission::create([
                'name' => $request->input('name'),
            ]);

        return response()->json([
            'message' => 'Permission created successfully.'
        ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Permission creation failed.' . $e->getMessage()
            ]);
        }
    }

    public function show(Permission $permission)
    {
        return view('permissions.show', compact('permission'));
    }

    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request -> validate([
            'name' => 'required|unique:permissions'
        ]);

        $permission->update([
            'name' => $request->name
        ]);

        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully.');
    }

    public function attachRoles(Request $request, Permission $permission)
    {
        $roles = $request->input('roles', []);

        $permission->roles()->sync($roles);

        return redirect()->route('permissions.index')->with('success', 'Roles attached successfully.');
    }
}
