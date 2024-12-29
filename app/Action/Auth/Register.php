<?php

namespace App\Action\Auth;

use App\Events\UserRegister;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Register{

    public function execute($request){

        $user = User::create($request);

        if($user){
            event(new UserRegister($user));
            return true;
        }

        return false;
    }
}