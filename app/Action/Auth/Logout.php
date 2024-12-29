<?php

namespace App\Action\Auth;

class Logout{

    public function execute($request){

        $user = $request->user()->currentAccessToken();

        if(!empty($user))
        {
            return $user->delete();
        }
        return false;

    }
}