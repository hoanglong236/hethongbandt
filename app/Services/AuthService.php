<?php

namespace App\Services;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthService {

    public function login($adminLoginDTO) {
        $admin = Admin::where('email', $adminLoginDTO->email)->first();

        if (!isset($admin->id)) {
            return false;
        }
        return Hash::check($adminLoginDTO->password, $admin->password);
    }
}
