<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StorUserRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use HttpResponses;

    public function login(LoginUserRequest $request)
    {
        $request->validated($request->all());

        if(!Auth::attempt($request->only(['email','password'])))
        {
            return $this->error('','Credentials do not match',401);
        }
        $user = User::where('email',$request->email)->first();
        return $this->success([
            'user'=>$user,
            'token'=>$user->createToken('Api Token of'.$user->name)->plainTextToken
        ]);
    }

    public function register(StorUserRequest $request)
    {
        $request->validated($request->all());
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'address'=>$request->address,
            'phone'=>$request->phone,
            'pincode'=>$request->pincode,
        ]);
        return $this->success([
            'user'=>$user,
            'token'=>$user->createToken('API Token of'.$user->name)->plainTextToken,
        ]);
    }

    public function logout()
    {
       Auth::user()->currentAccessToken()->delete();
       return $this->success([
        'message'=>'you have login oute'
       ]);
    }
}
