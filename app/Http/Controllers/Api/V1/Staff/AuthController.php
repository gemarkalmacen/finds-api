<?php

namespace App\Http\Controllers\Api\V1\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use App\Services\V1\Users\VerifyPassword;
use App\Services\V1\Staff\Users\LoginUser;
// use App\Services\V1\Users\IsUserActive;
use App\Services\V1\Staff\Users\GetUserByEmail;
use App\Http\Requests\V1\Staff\Auth\UserLoginRequest;

class AuthController extends Controller
{
    // public function register(Request $request){
    // }

    public function login(UserLoginRequest $userLoginRequest,
                          GetUserByEmail $getUserByEmail,
                        //   IsUserActive $isUserActive,
                          VerifyPassword $verifyPassword,
                          LoginUser $loginUser)
    {
        $user = $getUserByEmail->execute($userLoginRequest->email);
        
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

        $token = $loginUser->execute($user, $userLoginRequest->only(['email', 'password']), true);
        
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
                'id' => $user->id,
                'email' => $user->email,
                'mobile' => $user->mobile,
                'name' => $user->name,
                // 'user_details' => [
                //     'first_name' => $user->detail->first_name,
                //     'middle_name' => $user->detail->middle_name ?? '',
                //     'last_name' => $user->detail->last_name,
                // ],
                // 'roles' => [
                //     'id' => $role->id,
                //     'name' => $role->name,
                // ],
                // 'user_settings' => [
                //     'languages' => isset($user->setting->language) ? [
                //         'id' => $user->setting->language->id ,
                //         'code' => $user->setting->language->code
                //     ] : []
                // ],
                'created_at' => $user->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $user->updated_at->format('Y-m-d H:i:s'),
                'deleted_at' => $user->deleted_at ? $user->deleted_at->format('Y-m-d H:i:s') : '',
            ]
        ]);

    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return [
            
        ];
    }
}
