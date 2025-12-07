<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = [
            ['email' => 'admin@posystem.com', 'password' => 'admin123', 'name' => 'System Administrator', 'role' => 'Admin'],
            ['email' => 'manager@posystem.com', 'password' => 'manager123', 'name' => 'Store Manager', 'role' => 'Manager'],
            ['email' => 'cashier@posystem.com', 'password' => 'cashier123', 'name' => 'Lead Cashier', 'role' => 'Cashier']
        ];

        foreach ($credentials as $user) {
            if ($request->email === $user['email'] && $request->password === $user['password']) {
                session([
                    'admin_logged_in' => true,
                    'admin_user' => $user
                ]);
                return redirect()->route('admin.dashboard');
            }
        }

        return back()->withErrors(['Invalid credentials']);
    }

    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_user']);
        return redirect()->route('admin.login');
    }
}