<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use narutimateum\Toastr\Facades\Toastr;
use Yajra\Datatables\Facades\Datatables;

class RoleController extends Controller
{
    public function listing()
    {
        // roles
        $roles = Role::select([
            'id',
            'name',
            'display_name',
            'description',
            'created_at',
            'updated_at'
        ])->get();

        // return roles
        return Datatables::of($roles)
            ->addColumn('action', function ($role) {
                // permission - edit
                $edit = $delete = null;
                if (Auth::user()->can('role-edit')) {
                    $edit = '<a href="roles/' . $role->id . '/edit" title="Editar"><i class="fa fa-pencil"></i></a>';
                }
                // permission - delete
                if (Auth::user()->can('role-delete')) {
                    $delete = '<button type="button" value="' . $role->id . '" onclick="confirmDelete(this);" data-toggle="modal" data-target="#modalQuestion"><i class="fa fa-close" aria-hidden="true" title="Eliminar"></i></button>';
                }
                // return action
                return '<a href="roles/' . $role->id . '" title="Ver"><i class="fa fa-eye"></i></a>' . $edit . $delete;
            })
            ->editColumn('created_at', function ($role) {
                return '<span class="badge badge-success badge-md"><i class="fa fa-clock-o"></i> ' . $role->created_at->toFormattedDateString() . '</span>';
            })
            ->editColumn('display_name', function ($role) {
                return '<p>' . $role->display_name . '</p><p class="small">Creado ' . $role->created_at->diffForHumans() . '</p>';
            })
            ->editColumn('updated_at', function ($role) {
                return '<span class="badge badge-primary badge-md"><i class="fa fa-clock-o"></i> ' . $role->updated_at->toFormattedDateString() . '</span>';
            })
            ->rawColumns(['action', 'created_at', 'display_name', 'updated_at'])
            ->make(true);
    }

    public function index()
    {
        // redirect
        return view('roles.index');
    }

    public function create()
    {
        //
        $permission = Permission::get();
        return view('roles.create', compact('permission'));
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'display_name' => 'required',
            'description' => 'required',
            'permission' => 'required',
        ]);

        $role = new Role();
        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();

        foreach ($request->input('permission') as $key => $value) {
            $role->attachPermission($value);
        }

        // notification
        Toastr::success(
            '¡Agregado correctamente!',
            $title = $request->input('name'),
            $options = [
                // options
            ]
        );

        // condition
        if ($request->input('action') === 'Guardar')
            return redirect()->route('roles.index');

        return redirect()->route('roles.create');
    }

    public function show($id)
    {
        //
        $role = Role::find($id);
        $rolePermissions = Permission::join("permission_role", "permission_role.permission_id", "=", "permissions.id")
            ->where("permission_role.role_id", $id)
            ->get();

        return view('roles.show', compact('role', 'rolePermissions'));
    }

    public function edit($id)
    {
        //
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("permission_role")->where("permission_role.role_id", $id)
            ->pluck('permission_role.permission_id', 'permission_role.permission_id')->toArray();

        return view('roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'display_name' => 'required',
            'description' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();

        DB::table("permission_role")->where("permission_role.role_id", $id)
            ->delete();

        foreach ($request->input('permission') as $key => $value) {
            $role->attachPermission($value);
        }

        // notification
        Toastr::success(
            '¡Actualizado correctamente!',
            $title = 'Rol',
            $options = [
                // options
            ]
        );

        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        // find
        DB::table("roles")->where('id', $id)->delete();

        // response
        return response()->json([
            'title' => 'Rol',
            'message' => '¡Eliminado correctamente!'
        ]);
    }
}
