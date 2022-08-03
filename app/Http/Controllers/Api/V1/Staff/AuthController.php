<?php

namespace App\Http\Controllers\Api\V1\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use App\Services\V1\Users\VerifyPassword;
use App\Services\V1\Staff\Users\LoginUser;
// use App\Services\V1\Users\IsUserActive;
use App\Services\V1\Staff\Users\GetUserByUsername;
use App\Services\V1\Staff\Users\GetUserDetailsByUserId;
use App\Http\Requests\V1\Staff\Auth\UserLoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // public function register(Request $request){
    // }

    public function login(UserLoginRequest $userLoginRequest,
                          GetUserByUsername $getUserByUsername,
                        //   IsUserActive $isUserActive,
                          VerifyPassword $verifyPassword,
                          LoginUser $loginUser)
    {
        $user = $getUserByUsername->execute($userLoginRequest->username);
        
        if(!$user) {
            return response()->json([
                'status' => __('messages.error'),
                'description' => __('messages.unauthorized'),
                'errors' => [
                    [
                        'code' => 5003,
                        'message' => __('staff/validations.credentials_invalid')
                    ]
                ]
            ], 401);
        }

        $password = $verifyPassword->execute($user, $userLoginRequest->input('password'));

        if(!$password) {
            return $this->formatValidation(401, __('messages.unauthorized'), [
                [
                    'code' => 5003,
                    'message' => __('staff/validations.credentials_invalid')
                ]
            ]);
        }

        $token = $loginUser->execute($user, $userLoginRequest->only(['username', 'password']), true);
        
        if(!$token) {
            return $this->formatValidation(401, __('messages.unauthorized'), [
                [
                    'code' => 5003,
                    'message' => __('staff/validations.credentials_invalid')
                ]
            ]);
        }

        // $role = $user->roles()->first();

        return response()->json([
            'status' => __('messages.status_success'),
            'description' => __('messages.ok'),
            'token' => $token,
            'data' => [
                'user' => Auth::user(),
                'details' => $getUserByUsername->execute(Auth::user()->username)
            ]
        ]);

    }

    public function logout(Request $request){
        auth('users')->logout();
        return [
            'status' => __('messages.status_success'),
            'description' => __('messages.ok'),
        ];
    }

    public function user(GetUserDetailsByUserId $getUserDetailsByUserId)
    {
        if (!Auth::check()) {
            return response()->json([
                'status' => __('messages.error'),
                'description' => __('messages.unauthorized'),
                'errors' => [
                    [
                        'code' => 5004,
                        'message' => __('auth.session_not_exist')
                    ]
                ]
            ], 401);
        } else {
            return response()->json([
                'status' => __('messages.status_success'),
                'description' => __('messages.ok'),
                'data' => [
                    'user' => Auth::user(),
                    'details' => $getUserDetailsByUserId->execute(Auth::user()->id)
                ]
            ]);
        }
    }
}
