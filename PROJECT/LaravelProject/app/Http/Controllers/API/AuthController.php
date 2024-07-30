<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Aranzman;


class AuthController extends Controller
{

    public function register(Request $request) { //request prima parametre za registraciju
        


  




        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:50',
            'email'=>'required|string|max:50|email|unique:users',
            'password'=>['required', Password::min(8)->letters()->numbers()->mixedCase()]

        ]);


        if($validator->fails())
            return response()->json(['warnning:' => 'Sifra mora imati minimalno 8 karaktera. Mora sadrzati barem jedno veliko i barem jedno malo slovo, kao i barem 1 broj.']);

 
        


        $user = User::create([
            'name' => $request->name,
            'email'=>$request->email,
            'password'=>$request->password,

        ]);


        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['data' => $user, 'access_token' => $token, 'token_type'=>'Bearer']);






    }


    public function login(Request $request) {

  
 
        if(Auth::attempt($request->only('email','password'))){
        return response()->json(['message' => 'Unauthorized'], 401);
        }

    $user = User::where('email', $request['email'])->firstOrFail();
    
    if (!$user || $request['password'] !== $user->password) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }

 

    $token = $user->createToken('auth_token')->plainTextToken;


    return response()->json(['message'=>'Hi, '. $user->name . ' ,welcome to home, ', 'access_token'=>$token, 'token_type'=>'Bearer']);


    
           

    }
    



    public function logout(Request $request)
    {
       $request->user()->tokens()->delete();
       return response()->json(['message'=> 'Successfully logged out!']);
    }



    
}
