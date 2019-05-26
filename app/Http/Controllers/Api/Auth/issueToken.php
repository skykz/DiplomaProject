<?php


namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

trait issueToken
{
public function issueToken(Request $request,$grantType,$scope="*"){

        $params = [
            'grant_type' => $grantType,
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'password' => $request->password,// just added to test
            'username' => $request->username ?: $request->email,
            'scope' => $scope // i can try to remove it
        ];

        $request->request->add($params);
        //        dd($request->all());
        $proxy =  Request::create('/oauth/token','post');
        return Route::dispatch($proxy);
    }
}
