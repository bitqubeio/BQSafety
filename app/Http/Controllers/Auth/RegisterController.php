<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_username' => 'required|max:15|unique:users',
            'user_names' => 'required|max:45',
            'user_lastnames' => 'required|max:45',
            'company_id' => 'required|integer',
            'user_code' => 'required|max:8|unique:users',
            'user_job' => 'required|max:45',
            'user_area' => 'required|max:45',
            'user_email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        // create user
        return User::create([
            'user_username' => $data['user_username'],
            'user_names' => $data['user_names'],
            'user_lastnames' => $data['user_lastnames'],
            'company_id' => $data['company_id'],
            'user_code' => $data['user_code'],
            'user_job' => $data['user_job'],
            'user_area' => $data['user_area'],
            'user_email' => $data['user_email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
