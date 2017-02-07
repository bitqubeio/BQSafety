<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
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
            ->editColumn('created_at', function ($user) {
                return '<span class="badge badge-primary badge-md"><i class="fa fa-clock-o"></i> ' . $user->created_at->toFormattedDateString() . '</span>';
            })
            ->editColumn('user_username', function ($user) {
                return '<small class="text-muted">' . $user->user_username . '</small>
                        <div class="imageuser">
                            <ul>
                                <li><img src="images/avatars/' . $user->avatar . '"> </li>
                            </ul>
                        </div>';
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
            ->rawColumns(['created_at', 'user_username', 'user_names', 'user_job', 'user_status'])
            ->make(true);
    }

    public function index()
    {
        // view
        return view('user.index');
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
        //
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
