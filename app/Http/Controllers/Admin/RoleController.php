<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

  function __construct()
  {
       $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
       $this->middleware('permission:role-create', ['only' => ['create','store']]);
       $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
       $this->middleware('permission:role-delete', ['only' => ['destroy']]);
  }
    public function index()
    {
      $roles = Role::all();
      return view('admin.roles.index', compact('roles'));
    }
    public function create()
    {
      return view('admin.roles.create');
    }
    public function store(Request $request)
    {
       $validated = $request->validate(['name' => ['required', 'min:3']]);
       $role = Role::create($validated);
      return to_route('admin.roles.index');

    }
    public function edit(Role $role)
    {
      $permissions = Permission::all();
      return view('admin.roles.edit', compact('role', 'permissions'));
    }
    public function update(Request $request, Role $role)
    {
      $validated = $request->validate(['name' => ['required', 'min:3']]);
      $role = $role->update($validated);
      return to_route('admin.roles.index');
    }
    public function givePermission(Request $request, Role $role)
    {
      if($role->hasPermissionTo($request->permission)){
          return back()->with('message', 'Permission Exists.');
      }
      $role->givePermissionTo($request->permission);
      return back()->with('message', 'Permission Added.');
    }
    public function revokePermission(Role $role, Permission $permission)
    {
      if($role->hasPermissionTo($permission)){
        $role->revokePermissionTo($permission);
          return back()->with('message', 'Permission revoked.');
      }
      $role->givePermissionTo($request->permission);
      return back()->with('message', 'Permission not.');
    }
}
