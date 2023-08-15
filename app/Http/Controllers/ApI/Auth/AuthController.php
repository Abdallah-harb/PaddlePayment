<?php

namespace App\Http\Controllers\ApI\Auth;

use App\Http\Controllers\Controller;
use App\Http\Helper\ResponseHelper;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserAuthResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        $token = auth('api')->attempt(["email" => $request->email, "password" => $request->password]);
        $user->token = $token;

        return ResponseHelper::sendResponseSuccess(new UserAuthResource($user));
    }



    public function login(LoginRequest $request)
    {
        if (!$token = auth('api')->attempt(["email" => $request->email, "password" => $request->password])) {
            return ResponseHelper::sendResponseError([], Response::HTTP_BAD_REQUEST, __("messages.The mobile number or password is incorrect"));
        }
        $user = User::whereEmail($request->email)->first();
        $user->token = $token;
        return ResponseHelper::sendResponseSuccess(new UserAuthResource($user));
    }


}
