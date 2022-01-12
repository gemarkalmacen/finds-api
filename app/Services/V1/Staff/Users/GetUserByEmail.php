<?php

namespace App\Services\V1\Staff\Users;

use App\Models\User;

class GetUserByEmail
{
    /**
     * @param $email
     * @return mixed
     */
    public function execute($email)
    {
        return User::where('email', $email)->first();
    }
}
