<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use App\Services\AdminService;
use App\DTOs\AdminLoginDTO;
use App\DTOs\AdminRegisterDTO;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    private $authService;
    private $adminService;

    public function __construct()
    {
        $this->authService = new AuthService();
        $this->adminService = new AdminService();
    }

    public function index()
    {
        return view('admin.login');
    }

    public function auth(Request $request)
    {
        $adminLoginDTO = new AdminLoginDTO();

        $adminLoginDTO->email = $request->post('email');
        $adminLoginDTO->password = $request->post('password');

        if ($this->authService->login($adminLoginDTO)) {
            return redirect()->route('admin.dashboard');
        }

        Session::flash('error_mess', 'Please enter valid login details');
        return redirect()->route('admin');
    }

    public function dashboard(Request $request)
    {
        $admin_name = $request->session()->get('ADMIN_NAME');
        return view('admin.dashboard', ['admin_name' => $admin_name]);
    }

    public function logout(Request $request)
    {
        $this->authService->logout();

        Session::flash('success_mess', 'Logout successfully');
        return redirect()->route('admin');
    }

    public function register()
    {
        return view('admin.register');
    }

    public function register_handle(Request $request)
    {
        $adminRegisterDTO = new AdminRegisterDTO();

        $adminRegisterDTO->email = $request->post('email');
        $adminRegisterDTO->password = $request->post('password');
        $adminRegisterDTO->fullName = $request->post('fullname');
        $adminRegisterDTO->phone = $request->post('phone');

        $this->adminService->register($adminRegisterDTO);

        Session::flash('success_mess', 'Register successfully');
        return redirect()->action([AdminController::class, 'index']);
    }
}
