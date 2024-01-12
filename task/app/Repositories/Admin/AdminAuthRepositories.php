<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\AdminAuthInterface;
use App\Providers\RouteServiceProvider;
use App\Models\Admin;
use App\Http\Requests\RegisterRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthRepositories implements AdminAuthInterface
{
    public function ShowLogin()
    {

        return view('admin.auth.login');
    }
    public function Login($request)
    {
        if (!Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
        return redirect(RouteServiceProvider::HOME);
    }
    public function ShowRegister()
    {
        return view('admin.auth.register');
    }
    public function Registrt($request)
    {

        $admin = Admin::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name
        ]);



        return redirect()->route('admin.index');
    }
}
