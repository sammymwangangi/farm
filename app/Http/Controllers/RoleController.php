<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function permissions()
    {
        $permissions = Permission::all();
        return view('dashboard.permissions', ['permissions' => $permissions]);
    }

    public function storePermission(Request $request)
    {

        $p = new Permission();
        $p->name = $request->name;
        $p->display_name = $request->display_name;
        $p->description = $request->description;
        $p->save();
        return redirect()->back()->with('success', 'Permission succesfully created!');
    }

    public function deletePermission($id)
    {
        DB::table('permission_role')->where('permission_id', $id)->delete();
        DB::table('permissions')->where('id', $id)->delete();
        return redirect()->back()->with('info', 'Permission has been deleted!');

    }
    
    // ==============================================================

    /**    ROLES        */
    // ==============================================================

    public function roles()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('dashboard.roles', ['roles' => $roles, 'permissions' => $permissions]);
    }

    public function addrole()
    {
        $permissions = Permission::all();
        return view('dashboard.addrole', ['permissions' => $permissions]);
    }

    public function storeRole(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles',
        ]);
        $role = Role::create($request->except(['permission', '_token']));
        if ($request->permission == "") {
            return redirect()->back()->with('success', 'Role succesfully created!');
        } else {
            foreach ($request->permission as $key => $value) {
                $role->attachPermission($value);
            }
            return redirect('/dashboard/roles')->with('success', 'Role succesfully created!');
        }

    }

    public function editRole($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        $role_permissions = $role->permissions()->pluck('id', 'id')->toArray();

        return view('dashboard.edit-role', compact('role', 'role_permissions', 'permissions'));
    }

    public function updateRole(Request $request, $id)
    {
        $role = Role::find($id);
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();

        DB::table('permission_role')->where('role_id', $id)->delete();
        if ($request->permission == "") {
            return redirect()->back()->with('info', 'Role updated!');
        } else {
            foreach ($request->permission as $key => $value) {
                $role->attachPermission($value);
            }
            return redirect()->back()->with('info', 'Role updated!');
        }
    }

    public function deleteRole($id)
    {
        DB::table('permission_role')->where('role_id', $id)->delete();
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->back()->with('warning', 'Role has been deleted!');

    }

}
