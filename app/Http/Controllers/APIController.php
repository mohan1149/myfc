<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{
    public function login(Request $request){
        try {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $reponse = [
                    'status' => true,
                    'user' => $user,
                ];
            }else{
                $reponse = [
                    'status' => false,
                    'error' => 'invalid_credentials',
                ];
            }
            return response()->json($reponse, 200);
        } catch(\Exception $e){
            $error = [
                'status'=> false,
                'error' => $e->getMessage(),
            ];
            return response()->json($error, 200);
        }
    }
    public function register(Request $request){
        try {
            $user = new User();
            $user->name = strip_tags($request['name']);
            $user->email = strip_tags($request['email']);
            $user->phone = strip_tags($request['phone']);
            $user->password = Hash::make($request['password']);
            $user->role = 0;
            $user->save();
            $reponse = [
                'status' => true,
            ];
            return response()->json($reponse, 200);
        } catch (\Exception $e) {
            $error = [
                'status'=> false,
                'error' => $e->getMessage(),
            ];
            return response()->json($error, 200);
        }
    }
}