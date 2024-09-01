<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(Request $request)
    {

        if (Auth::check()) {
            return redirect("dashboard");
        }
        return view("auth.login");
    }
 



    public function loginProcess(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');

        $login = auth()->attempt([
            'email' => $email,
            'password' => $password
        ]);



        if (!$login) {
            return $this->render('userLoginError', ' Bilgilerinizi kontrol ederek tekrar deneyiniz.', 403);
        } else {
            return $this->render('userLoginAccess', 'Hoşgeldiniz', 200);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }
}