<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Interfaces\Admin\AdminAuthInterface;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public $AdminAuthInterface;
    public function __construct(AdminAuthInterface $AdminAuthInterface)
    {
        $this->AdminAuthInterface = $AdminAuthInterface;
    }
    public function ShowLogin()
    {

        return $this->AdminAuthInterface->ShowLogin();
    }
    public function Login(Request $request)
    {
        return $this->AdminAuthInterface->Login($request);
    }
    public function ShowRegister()
    {
        return $this->AdminAuthInterface->ShowRegister();
    }
    public function Registrt(Request $request)
    {
        return $this->AdminAuthInterface->Registrt($request);
    }

    public function Logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
