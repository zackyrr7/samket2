<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api',['except'=>['login','register']]);
    }
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'nomor_hp'=>'required|numeric|unique:users|min:10',
            'password'=>'required|string|confirmed|min:6'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }
        $user = User::create(array_merge(
            $validator->validate(), 
            [
                'password'=>bcrypt($request->password)
            ]
        ));
        return response()->json([
            'message'=> 'User Succesfully registerd',
            'user'=>$user
        ],201);
    }


    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'nomor_hp'=>'required|numeric',
            'password'=>'required|string|min:6'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        if(!$token=auth()->attempt($validator->validate())){
            return response()->json(['error'=>'Unauthorized'],401);
        }
        return $this->CreateNewToken($token);
    }

    public function CreateNewToken($token){
        return response()->json([
            'acces_token'=>$token,
            'token_type'=>'bearer',
            //error tapi jalan
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user'=>auth()->user()
        ]);
    }
    public function profile(){
        return response()->json(auth()->user());
    }

    public function logout(){
        auth()->logout();
        return response()->json([
            'message'=> 'User logged out',
        ],201);
    }
}
