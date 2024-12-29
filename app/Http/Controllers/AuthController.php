<?php

namespace App\Http\Controllers;

use App\Action\Auth\Login;
use App\Action\Auth\Logout;
use App\Trait\ApiResponse;
use Illuminate\Http\Request;
use App\Action\Auth\Register;
use Illuminate\Support\Facades\Redis;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
{
    use ApiResponse;

    public function create(CreateUserRequest $request, Register $action){

        if($action->execute($request->all())){
            return $this->success([], 'User Created');
        }
        return $this->error('Cannot create user');

    }

    public function store(Request $request, Login $action){

        if($user = $action->execute($request->all())){
            return $this->success($user);
        }

        return $this->error('Invalid Email or Password');
    }

    public function destroy(Request $request, Logout $action)
    {
        if($action->execute($request))
        {
            return $this->success([], 'User Logged Out');
        }
        return $this->error('User not found or problem occured');
    }

}
