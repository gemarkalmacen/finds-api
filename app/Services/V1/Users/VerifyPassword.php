<?php

namespace App\Services\V1\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class VerifyPassword
{
    /**
     * @param User $user
     * @param string|null $password
     * @return bool
     */
    public function execute(User $user, ?string $password): bool
    {
        return Hash::check($password, $user->password);
    }
}
