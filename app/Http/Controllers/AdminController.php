<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $users = [
        ['id' => 1, 'name' => 'John Doe', 'email' => 'john@store.com', 'role' => 'admin', 'status' => 'active'],
        ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@store.com', 'role' => 'cashier', 'status' => 'active'],
        ['id' => 3, 'name' => 'Mike Wilson', 'email' => 'mike@store.com', 'role' => 'cashier', 'status' => 'inactive'],
    ];

    private $products = [
        ['id' => 1, 'name' => 'Laptop Pro', 'price' => 1299.99, 'stock' => 25, 'category' => 'Electronics'],
        ['id' => 2, 'name' => 'Wireless Mouse', 'price' => 29.99, 'stock' => 150, 'category' => 'Electronics'],
        ['id' => 3, 'name' => 'Coffee Mug', 'price' => 12.99, 'stock' => 80, 'category' => 'Home'],
        ['id' => 4, 'name' => 'Notebook Set', 'price' => 15.99, 'stock' => 200, 'category' => 'Office'],
    ];

    public function dashboard()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $stats = [
            'total_users' => count($this->users),
            'total_products' => count($this->products),
            'total_sales' => 15750.50,
            'pending_orders' => 12
        ];

        return view('admin.dashboard', compact('stats'));
    }

    public function users()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        return view('admin.users', ['users' => $this->users]);
    }

    public function createUser()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        return redirect()->route('admin.users')->with('success', 'User created successfully!');
    }

    public function editUser($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $user = collect($this->users)->firstWhere('id', (int)$id);
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        return redirect()->route('admin.users')->with('success', 'User updated successfully!');
    }

    public function deleteUser($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        return redirect()->route('admin.users')->with('success', 'User deleted successfully!');
    }

    public function products()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        return view('admin.products', ['products' => $this->products]);
    }

    public function createProduct()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        return view('admin.products.create');
    }

    public function storeProduct(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        return redirect()->route('admin.products')->with('success', 'Product created successfully!');
    }

    public function editProduct($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $product = collect($this->products)->firstWhere('id', (int)$id);
        return view('admin.products.edit', compact('product'));
    }

    public function updateProduct(Request $request, $id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        return redirect()->route('admin.products')->with('success', 'Product updated successfully!');
    }

    public function deleteProduct($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        return redirect()->route('admin.products')->with('success', 'Product deleted successfully!');
    }
}