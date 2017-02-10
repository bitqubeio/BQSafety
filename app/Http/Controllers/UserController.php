<?php

namespace App\Http\Controllers;

use App\Company;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use narutimateum\Toastr\Facades\Toastr;
use Yajra\Datatables\Facades\Datatables;

class UserController extends Controller
{
    public function listing()
    {
        // users
        $users = User::join('companies', 'companies.id', '=', 'users.company_id')
            ->select([
                'users.id',
                'user_username',
                'user_names',
                'user_lastnames',
                'company_name',
                'user_code',
                'user_job',
                'user_area',
                'user_email',
                'avatar',
                'user_status',
                'users.created_at'
            ])->get();

        // return
        return Datatables::of($users)
            ->addColumn('roles', function ($user) {
                // var
                $roles = null;
                // roles
                if (!empty($user->roles)) {
                    foreach ($user->roles as $v) {
                        $roles .= '<span class="badge badge-success badge-md">' . $v->display_name . '</span><br>';
                    }
                }
                // return action
                return $roles;
            })
            ->addColumn('action', function ($user) {
                // permission - edit
                $edit = $delete = null;
                if (auth()->user()->can('users-edit')) {
                    $edit = '<a href="users/' . $user->id . '/edit" title="Editar"><i class="fa fa-pencil"></i></a>';
                }
                // permission - delete
                if (auth()->user()->can('users-delete')) {
                    $delete = '<button type="button" value="' . $user->id . '" onclick="confirmDelete(this);" data-toggle="modal" data-target="#modalQuestion"><i class="fa fa-close" aria-hidden="true" title="Eliminar"></i></button>';
                }
                // return action
                return '<a href="users/' . $user->id . '" title="Ver"><i class="fa fa-eye"></i></a>' . $edit . $delete;
            })
            ->editColumn('created_at', function ($user) {
                return '<span class="badge badge-primary badge-md"><i class="fa fa-clock-o"></i> ' . $user->created_at->toFormattedDateString() . '</span>';
            })
            ->editColumn('user_username', function ($user) {
                return '<small class="text-muted">' . $user->user_username . '</small><div class="imageuser"><ul><li><img src="images/avatars/' . $user->avatar . '"></li></ul></div>';
            })
            ->editColumn('user_names', function ($user) {
                return '<p>' . $user->user_lastnames . ', ' . $user->user_names . '</p><p class="small">Creado ' . $user->created_at->diffForHumans() . '</p>';
            })
            ->editColumn('user_job', function ($user) {
                return '<p class="medium">' . $user->user_job . '</p><p class="medium">' . $user->user_area . '</p>';
            })
            ->editColumn('user_status', function ($user) {
                if ($user->user_status) {
                    $status = '<span class="badge badge-success badge-md">ACTIVADO</span>';
                } else {
                    $status = '<span class="badge badge-danger badge-md">DESACTIVADO</span>';
                }
                return $status;
            })
            ->rawColumns(['roles', 'action', 'created_at', 'user_username', 'user_names', 'user_job', 'user_status'])
            ->make(true);
    }

    public function index()
    {
        // view
        return view('users.index');
    }

    public function create()
    {
        //
        $roles = Role::lists('display_name', 'id');
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    public function show($id)
    {
        // find
        $user = User::find($id);

        // redirect
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        // find
        $user = User::find($id);
        $roles = Role::pluck('display_name', 'id');
        $userRole = $user->roles->pluck('id', 'id')->toArray();

        // companies
        $companies = Company::where('company_status', 1)->pluck('company_name', 'id');

        // redirect
        return view('users.edit', compact('user', 'roles', 'userRole', 'companies'));
    }

    public function update(Request $request, $id)
    {
        // validation
        $this->validate($request, [
            //'user_username' => 'required',
            //'user_names' => 'required',
            //'user_lastnames' => 'required',
            //'company_id' => 'required',
            //'user_code' => 'required',
            //'user_job' => 'required',
            //'user_area' => 'required',
            //'user_email' => 'required|email|unique:users,user_email,' . $id,
            'roles' => 'required'
        ]);

        $input = $request->all();

        $user = User::find($id);

        $titles = $user->user_username;

        $user->update($input);

        DB::table('role_user')->where('user_id', $id)->delete();

        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }

        // notification
        Toastr::success(
            '¡Actualizado correctamente!',
            $title = $titles,
            $options = [
                // options
            ]
        );

        // redirect
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        // find
        $user = User::findOrFail($id);

        // title for alerts
        $title = $user->user_username;

        // delete
        $user->delete();

        // response
        return response()->json([
            'title' => $title,
            'message' => '¡Eliminado correctamente!'
        ]);
    }
}
