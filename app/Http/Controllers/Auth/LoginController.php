<?php

namespace App\Http\Controllers\Auth;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        $settings = [
            'nome' => Setting::findByName('nome'),
            'logo_url' => Setting::findByName('logo_url')
        ];
        $data = ['settings' => $settings];
        return view('auth.login')->with($data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function attempt(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('admin/products');
        } else {
            return redirect('admin/login')->with('error', 'Login ou senha inválidos');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('admin')->with('status', 'Logout realizado com sucesso');
    }
}
