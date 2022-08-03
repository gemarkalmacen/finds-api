<?php

namespace App\Services\V1\Staff\Users;

use App\Models\UserDetail;

class GetUserDetailsByUserId
{
    /**
     * @param $email
     * @return mixed
     */
    public function execute($id)
    {
        return UserDetail::where('user_id', $id)->first();
    }
}
