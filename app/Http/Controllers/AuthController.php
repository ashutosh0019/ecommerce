<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'phone'=>'required|string',
            'password'=>'required|string|confirmed',
        ]);

        $user = User::create([
            'name'=>$fields['name'],
            'email'=>$fields['email'],
            'phone'=>$fields['phone'],
            'password'=> bcrypt($fields['password']),
        ]);
        
        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user'=> $user,
            'token'=> $token
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email'=>'required|string',            
            'password'=>'required|string',
        ]);

        //check email
        $user = User::where('email', $fields['email'])->first();
        //check password
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response ([
                'message' => 'BAD CREDS'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user'=> $user,
            'token'=> $token
        ];

        return response($response, 201);
    }


    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return [
            'message'=>'logout out'
        ];
    }
}
