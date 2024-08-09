<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt($request->only("email", "password"))) {
            $data = auth()->user()->createToken('invoice')->plainTextToken;
            return response($data, 202);
        }
        return response('Unauthorized', 401);
    }

    public function logout()
    {
        return auth()->user()->currentAccessToken()->delete();
    }
}
