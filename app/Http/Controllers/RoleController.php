<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // ensure only authenticated users
    }

    // List all roles
    public function index()
    {
        $roles = Role::paginate(15);
        return view('roles.index', compact('roles'));
    }

    // Show create role form
    public function create()
    {
        return view('roles.create');
    }

    // Store new role
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name',
        ]);

        Role::create([
            'name' => $request->name
        ]);

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    // Show edit role form
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    // Update role
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name,' . $role->id,
        ]);

        $role->update([
            'name' => $request->name
        ]);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    // Delete role
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
