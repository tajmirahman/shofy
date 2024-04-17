<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    //All Permission
    public function AllPermission()
    {
        $permissions = Permission::latest()->get();
        return view('backend.pages.all_permission', compact('permissions'));
    }

    //Add Permission
    public function AddPermission()
    {
        return view('backend.pages.add_permission');
    }

    //Store Permission
    public function StorePermission(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:' . Permission::class],
            'group_name' => ['required', 'string', 'max:255',],
        ]);

        Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
            'created_at' => now(),
        ]);

        $notification = array(
            'message' => 'Permission Added Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }

    //Edit Permission
    public function EditPermission($id)
    {
        $permissions = Permission::find($id);
        return view('backend.pages.edit_permission', compact('permissions'));
    }

    //Update Permission
    public function UpdatePermission(Request $request)
    {

        $uid = $request->id;

        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:' . Permission::class],
            'group_name' => ['required', 'string', 'max:255',],
        ]);

        Permission::find($uid)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission Update Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.permission')->with($notification);
    }

    //Delete Permission
    public function DeletePermission($id)
    {
        Permission::find($id)->delete();

        $notification = array(
            'message' => 'Permission Delete Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.permission')->with($notification);
    }


    ///////////////////// Role /////////////////

    //All Role
    public function AllRole()
    {
        $roles = Role::latest()->get();
        return view('backend.pages.role.all_role', compact('roles'));
    }

    //Add Permission
    public function AddRole()
    {
        return view('backend.pages.role.add_role');
    }

    //Store Role
    public function StoreRole(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:' . Role::class],
        ]);

        Role::create([
            'name' => $request->name,
            'created_at' => now(),
        ]);

        $notification = array(
            'message' => 'Role Added Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }

    //Edit Role
    public function EditRole($id)
    {
        $roles = Role::find($id);
        return view('backend.pages.role.edit_role', compact('roles'));
    }

    //Update Role
    public function UpdateRole(Request $request)
    {
        $uid = $request->id;

        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:' . Role::class],
        ]);

        Role::find($uid)->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Role Update Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.role')->with($notification);
    }

    //Delete Role
    public function DeleteRole($id)
    {
        Role::find($id)->delete();

        $notification = array(
            'message' => 'Role Delete Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.role')->with($notification);
    }

    ////////////////// Role & Permission ////////////////

    public function AllRolesPermission()
    {
        $roles = Role::all();
        return view('backend.pages.rolesetup.all_roles_permission', compact('roles'));
    } // End Method

    //Add Roles Permission
    public function AddRolesPermission()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();

        return view('backend.pages.rolesetup.add_role_permission', compact('roles', 'permissions', 'permission_groups'));
    }

    //Store RolesPermission

    public function StoreRolesPermission(Request $request)
    {
        $data = array();
        $permissions = $request->permission;

        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        } // end foreach 

        $notification = array(
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    //EditRolesPermission
    public function EditRolesPermission($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();

        return view('backend.pages.rolesetup.edit_roles_permission', compact('role', 'permissions', 'permission_groups'));
    }

    // Admin Roles Update
    public function UpdateRolesPermission(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $permissions = $request->permission;

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        $notification = array(
            'message' => 'Role Permission Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.roles.permission')->with($notification);
    } // End Method 

    //Delete Roles Permission
    public function DeleteRolesPermission($id)
    {

        $role = Role::findOrFail($id);
        if (!is_null($role)) {
            $role->delete();
        }

        $notification = array(
            'message' => 'Role Permission Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // End Method


}
