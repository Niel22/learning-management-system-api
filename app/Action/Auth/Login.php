<?php

namespace App\Action\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Login{

    public function execute($request){
        
        if(Auth::attempt($request)){
            $user = Auth::user();

            $token = $user->createToken($user['email'])->plainTextToken;

            return [
                'user' => $user,
                'token' => $token
            ];
        }


        return false;
    }
}