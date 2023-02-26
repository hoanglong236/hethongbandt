<?php

namespace App\Services;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthService {

    public function login($adminLoginDTO) {
        $admin = Admin::where('email', $adminLoginDTO->email)->first();

        if (!isset($admin->id)) {
            return false;
        }
        if (Hash::check($adminLoginDTO->password, $admin->password)) {
            Session::put('ADMIN_LOGIN', true);
            Session::put('ADMIN_ID', $admin->id);
            Session::put('ADMIN_NAME', $admin->name);

            return true;
        }
        return false;
    }

    public function logout() {
        Session::forget('ADMIN_LOGIN');
        Session::forget('ADMIN_ID');
        Session::forget('ADMIN_NAME');
    }
}
