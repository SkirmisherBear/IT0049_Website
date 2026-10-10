<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function loginForm(): string
    {
        return view('auth/login', [
            'title' => 'Login',
            'error' => '',
        ]);
    }

    public function attemptLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if (! $user || ! password_verify($password, $user['password'])) {
            return view('auth/login', [
                'title' => 'Login',
                'error' => 'Invalid username or password.',
            ]);
        }

        session()->regenerate(true);
        session()->set([
            'user_id'    => $user['id'],
            'username'   => $user['username'],
            'isLoggedIn' => true,
        ]);

        return redirect()->to(site_url('customers'));
    }
    public function logout()
{
    session()->destroy();

    return redirect()->to(site_url('login'));
}
}