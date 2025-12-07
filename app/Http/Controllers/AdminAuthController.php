<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    private $users = [
        [
            'email' => 'admin@store.com',
            'password' => 'admin123',
            'name' => 'Admin User',
            'role' => 'admin'
        ],
        [
            'email' => 'cashier@store.com',
            'password' => 'cashier123',
            'name' => 'Cashier User',
            'role' => 'cashier'
        ]
    ];

    public function showLogin()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        foreach ($this->users as $user) {
            if ($user['email'] === $email && $user['password'] === $password) {
                session([
                    'admin_logged_in' => true,
                    'admin_user' => $user
                ]);
                return redirect()->route('admin.dashboard');
            }
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_user']);
        return redirect()->route('admin.login');
    }
}