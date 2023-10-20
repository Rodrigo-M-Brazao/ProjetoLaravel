<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Requests\Api\AuthRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //
    public function auth(AuthRequest $request){
        $credentials = $request->only([
            'email',
            'password',
            'device_name'
        ]);
        $user = Usuario::where('email',$request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect']
            ]);
        }
        //Pode fazer um if pra isso só ocorrer caso a pessoa
        // queira sair de todos aparelhos
        // que ela conectou
        $user->tokens()->delete();

        $token = $user->createToken($request->device_name)->plainTextToken;
        return response()->json([
            'token' => $token
        ]);
    }
}
