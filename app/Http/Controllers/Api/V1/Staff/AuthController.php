<?php

namespace App\Http\Controllers\Api\V1\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use App\Services\V1\Users\VerifyPassword;
use App\Services\V1\Staff\Users\LoginUser;
use App\Services\V1\Users\IsUserActive;
use App\Services\V1\Staff\Users\GetUserByEmail;
use App\Http\Requests\V1\Staff\Auth\UserLoginRequest;

class AuthController extends Controller
{

    public function register(Request $request){

    }

    public function login(UserLoginRequest $userLoginRequest,
                          GetUserByEmail $getUserByEmail,
                          IsUserActive $isUserActive,
                          VerifyPassword $verifyPassword,
                          LoginUser $loginUser)
    // public function login(Request $request)
    {
        
        /*$request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);
        
        

        $user = \App\Models\User::where('email', $request->email)->first();
        
        

        if(! $user || !Hash::check($request->password, $user->password)){
            // throw ValidationException::withMessages([
            //     'email' => ['The provided credentials are incorrect.'],
            // ]);

            return $this->formatValidation(401, __('messages.unauthorized'), [
                [
                    'code' => 5003,
                    'message' => __('staff/validations.credentials_invalid')
                ]
            ]);

            return "wala";
        } else {
            return "pasok";
        }

        dd($request);
        
        return $user->createToken($request->device_name)->plainTextToken;*/
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return [
            
        ];
    }
}
