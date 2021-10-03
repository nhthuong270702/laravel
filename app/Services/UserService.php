<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\UserRegister;
use App\Http\Requests\UserLogin;



class UserService
{
    //registered
    public function register(UserRegister $request)
    {
        $validated = $request->validated();
        $validated["password"] = bcrypt($validated["password"]);
        $user = User::create($validated);
        return response()->json(['user' => $user, 'msg'=>'Dang ky thanh cong'],200);
    }
    //login
    public function login(UserLogin $request)
    {
        $validated = $request->validated();

        if(auth()->attempt($validated)){
            $user = auth()->user();
            $token = $user->createToken('lalala.vn')->accessToken;
            return response()->json(['user'=>$user,'token'=>$token,'msg'=>'Dang nhap thanh cong'], 200);
        }else{
            return response()->json(['Dang nhap that bai'],211);
        }
    }
    //details
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }
}
