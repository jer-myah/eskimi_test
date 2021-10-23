<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\AuthService;

class AuthController extends Controller
{

    private $authService;

    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function register(StoreUserRequest $request)
    { 
        try { 
            $user = $this->authService->createUser($request);

            return response()->json([
                'status' => 'success',
                'code' => 201,
                'message' => 'User registered successfully',
                'data' => $user,
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'Unable to complete request',
                'data' => $e
            ]);
        }
    }

    /** 
     * method for user login and create token
     * 
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     */
    public function login(LoginRequest $request)
    {
        if (! Auth::attempt($request->only('email', 'password')))
        {
            return response()->json([
                'status' => 'error',
                'code' => 401,
                'message' => 'Unauthorized'
            ]);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Hi '.$user->name.', welcome to home',
            'access_token' => $token, 
            'token_type' => 'Bearer', 
        ]);
    }

    /** 
     * method for user logout and delete token
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'You have successfully logged out!'
        ]);
    }

}
