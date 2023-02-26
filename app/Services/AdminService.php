<?php

namespace App\Services;

use App\Models\Admin;

class AdminService
{

    public function register($adminRegisterDTO)
    {
        $admin = new Admin();

        $admin->email = $adminRegisterDTO->email;
        $admin->password = $adminRegisterDTO->password;
        $admin->fullName = $adminRegisterDTO->fullName;
        $admin->phone = $adminRegisterDTO->phone;

        $admin->save();
    }
}
