<?php

namespace App\Services\V1\Staff\Users;

use App\Models\User;
// use App\Services\V1\Users\IsUserActive;
use Illuminate\Support\Facades\Hash;

class LoginUser
{
    /**
     * @var IsUserActive
     */
    // private $isUserActive;

    // public function __construct(IsUserActive $isUserActive)
    // {
    //     $this->isUserActive = $isUserActive;
    // }

    /**
     * @param User $user
     * @param $param
     * @param $isStaff
     * @return false|string
     */
    public function execute(User $user, $param, $isStaff)
    {
        // $role = $user->roles()->first();

        // if(!$role) {
        //     return false;
        // }

        // admin but role is guest
        // if($isStaff && $role->is_staff == 0) {
        //     return false;
        // }

        // user but role = admin
        // if(!$isStaff && $role->is_staff == 1) {
        //     return false;
        // }

        // if not active
        // if(!$this->isUserActive->execute($user) && blank($user->detail->inactive_type)) {
        //     return false;
        // }

        // Attempt
        if (!auth('users')->attempt($param)) {
            // Event here
            return User::LOGIN_BAD_CREDENTIALS;
        }
        
        

        // Get client info
        $type = 'mobile';
        $device = request()->device_name;
        if (empty($device)) {
            $type = 'web';
            $device = request()->ip();
        }

        $latest = $user->tokens()->latest()->take(9)->pluck('id');
        $user->tokens()->whereNotIn('id', $latest)->delete();

        // Create token
        $token = $user->createToken($device);
        $token->accessToken->save();

        return $token->plainTextToken;

    }
}
