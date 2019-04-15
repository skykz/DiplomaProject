<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Laravel\Passport\Client;
use App\User;


class RegisterController extends Controller
{
    private $client;

    use issueToken;
    /**
     * RegisterController constructor.
     */
    public function __construct()
    {
        $this->client = Client::find(1);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

//        $params = [
//            'grant_type' => 'password',
//            'client_id' => $this->client->id,
//            'client_secret' => $this->client->secret,
//            'username' => $request->username ?: $request->email,
//            'password' => request('password'),
//            'scope' => '*'
//        ];
//
//        $request->request->add($params);
//        $proxy = Request::create('oauth/token','POST');
//        return Route::dispatch($proxy);

        return $this->issueToken($request,'password');

    }

    public function index()
    {
        //
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
