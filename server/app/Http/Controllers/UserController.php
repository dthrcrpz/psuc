<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\Exception;
use App\User;

class UserController extends Controller
{
	protected function jwt($user){
		$payload = [
			"iss" => "laravel-jwt",
			"sub" => $user->id,
			"iat" => time(),
			"exp" => time() + 60 * 120
		];

		return JWT::encode($payload, env('JWT_SECRET'));
	}

    protected function validateToken(Request $r){
        $token = $r->token;
        if(!$token) {
            return response()->json([
                'error' => 'Token not provided.'
            ], 401);
        }
        try {
            $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
        } catch(ExpiredException $e) {
            return response()->json([
                'error' => 'Provided token is expired.'
            ], 400);
        } catch(Exception $e) {
            return response()->json([
                'error' => 'An error while decoding token.'
            ], 400);
        }
        return 1;
    }

    public function login(Request $r){
    	$password = md5(hash('sha512', $r->password).hash('ripemd160', $r->password).md5("strongest"));
    	$user = User::where('username', $r->username)->where('password', $password)->first();

    	if($user){
    		return response()->json([
    			'token' => $this->jwt($user),
    			'expiry' => time() + 60 * 120
     		]);
    	}else{
    		return 0;
    	}
    }
}
