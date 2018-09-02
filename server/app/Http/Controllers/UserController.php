<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use App\User;

class UserController extends Controller
{
	protected function jwt($user){
		$payload = [
			"iss" => "laravel-jwt",
			"sub" => $user->id,
			"iat" => time(),
			"exp" => time() + 60 * 60
		];

		return JWT::encode($payload, env('JWT_SECRET'));
	}

    public function login(Request $r){
    	$password = md5(hash('sha512', $r->password).hash('ripemd160', $r->password).md5("strongest"));
    	$user = User::where('username', $r->username)->where('password', $password)->first();

    	if($user){
    		return response()->json([
    			'token' => $this->jwt($user),
    			'expiry' => time() + 60 * 60
     		]);
    	}else{
    		return 0;
    	}
    }
}
