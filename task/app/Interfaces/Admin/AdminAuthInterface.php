<?php

namespace App\Interfaces\Admin;

interface AdminAuthInterface
{
    public function ShowLogin();
    public function Login($request);
    public function ShowRegister();
    public function Registrt($request);

}
