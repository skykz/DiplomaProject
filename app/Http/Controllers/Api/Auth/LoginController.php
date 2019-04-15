<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    use issueToken;
    private $client;

    public function __construct()
    {
        $this->client = Client::find(1);
    }

    public function login(Request $request){

        $this->validate($request,[
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        return $this->issueToken($request,'password');
    }

    public function refresh(Request $request){

        $this->validate($request,[
            'refresh_token' => 'required'
        ]);

        $params = [
            'grant_type' => 'refresh_token',
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'username' => $request->username ?: $request->email,
            'password' => request('password'),
            'scope' => '*'
        ];

        $request->request->add($params);
        $proxy = Request::create('oauth/token','POST');
        return Route::dispatch($proxy);


    }


    public function logout(Request $request){

        $accessToken = Auth::user()->token();

        DB::table('oauth_refresh_tokens')
            ->where('access_token_id',$accessToken->id)->update(['revoked' => true]);

        $accessToken->revoke();

        $message = "user is not logged!";

        return response()->json([$message],204);
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
