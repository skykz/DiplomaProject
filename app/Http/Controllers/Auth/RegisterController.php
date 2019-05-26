<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Api\Auth\issueToken;
use App\Http\Controllers\FireBaseController;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\FirebaseAuthCustom;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class RegisterController extends Controller
{
    //TODO: don't use 'courier' string in registration form
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
        $firebase = (new Factory)->withServiceAccount($serviceAccount)->create();

        $auth = $firebase->getAuth()->createUser([
            'email'=> $data['email'],
            'password' =>$data['password']
        ]);
        $data1 = $auth->uid;

        return User::create([
            'name' => $data['name'],
            'f_uid' =>$data1,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
