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
            'username' => $request->username ?: $request->email,
            'scope' => $scope
        ];

        $request->request->add($params);
        //        dd($request->all());
        $proxy =  Request::create('oauth/token','POST');
        return Route::dispatch($proxy);
    }
}
