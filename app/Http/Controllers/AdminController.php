<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        // Check admin authentication for all methods
    }

    private function checkAuth()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        return null;
    }

    public function dashboard()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $stats = [
            'today_sales' => 15750.00,
            'today_transactions' => 89,
            'total_products' => 1247,
            'low_stock_alerts' => 23,
            'total_customers' => 3456,
            'monthly_revenue' => 125340.00,
            'average_transaction' => 177.00,
            'top_selling_category' => 'Electronics'
        ];

        $recent_sales = [
            ['id' => 'TXN001', 'customer' => 'John Smith', 'amount' => 245.99, 'items' => 3, 'time' => '2 minutes ago'],
            ['id' => 'TXN002', 'customer' => 'Sarah Wilson', 'amount' => 89.50, 'items' => 2, 'time' => '5 minutes ago'],
            ['id' => 'TXN003', 'customer' => 'Mike Johnson', 'amount' => 156.75, 'items' => 4, 'time' => '8 minutes ago'],
            ['id' => 'TXN004', 'customer' => 'Emily Davis', 'amount' => 67.25, 'items' => 1, 'time' => '12 minutes ago'],
            ['id' => 'TXN005', 'customer' => 'Robert Brown', 'amount' => 324.00, 'items' => 5, 'time' => '15 minutes ago']
        ];

        $low_stock = [
            ['name' => 'iPhone 15 Pro', 'sku' => 'IPH15P', 'current' => 3, 'minimum' => 10, 'category' => 'Electronics'],
            ['name' => 'Samsung Galaxy S24', 'sku' => 'SGS24', 'current' => 5, 'minimum' => 15, 'category' => 'Electronics'],
            ['name' => 'Wireless Headphones', 'sku' => 'WH001', 'current' => 2, 'minimum' => 20, 'category' => 'Audio'],
            ['name' => 'USB-C Cable', 'sku' => 'USBC01', 'current' => 8, 'minimum' => 50, 'category' => 'Accessories']
        ];

        return view('admin.dashboard', compact('stats', 'recent_sales', 'low_stock'));
    }

    public function pos()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $categories = [
            ['id' => 1, 'name' => 'Electronics', 'color' => 'bg-blue-500'],
            ['id' => 2, 'name' => 'Clothing', 'color' => 'bg-purple-500'],
            ['id' => 3, 'name' => 'Food & Beverage', 'color' => 'bg-green-500'],
            ['id' => 4, 'name' => 'Home & Garden', 'color' => 'bg-orange-500'],
            ['id' => 5, 'name' => 'Sports', 'color' => 'bg-red-500'],
            ['id' => 6, 'name' => 'Books', 'color' => 'bg-indigo-500']
        ];

        $products = [
            ['id' => 1, 'name' => 'iPhone 15 Pro', 'price' => 999.99, 'barcode' => '123456789012', 'category_id' => 1, 'image' => 'iphone.jpg'],
            ['id' => 2, 'name' => 'Samsung Galaxy S24', 'price' => 899.99, 'barcode' => '123456789013', 'category_id' => 1, 'image' => 'samsung.jpg'],
            ['id' => 3, 'name' => 'Nike Air Max', 'price' => 129.99, 'barcode' => '123456789014', 'category_id' => 5, 'image' => 'nike.jpg'],
            ['id' => 4, 'name' => 'Levi\'s Jeans', 'price' => 79.99, 'barcode' => '123456789015', 'category_id' => 2, 'image' => 'jeans.jpg'],
            ['id' => 5, 'name' => 'Coca Cola 12-pack', 'price' => 4.99, 'barcode' => '123456789016', 'category_id' => 3, 'image' => 'coke.jpg'],
            ['id' => 6, 'name' => 'The Great Gatsby', 'price' => 12.99, 'barcode' => '123456789017', 'category_id' => 6, 'image' => 'book.jpg']
        ];

        return view('admin.pos', compact('categories', 'products'));
    }

    public function products()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $products = [
            ['id' => 1, 'name' => 'iPhone 15 Pro', 'sku' => 'IPH15P', 'price' => 999.99, 'cost' => 750.00, 'stock' => 25, 'category' => 'Electronics', 'status' => 'Active'],
            ['id' => 2, 'name' => 'Samsung Galaxy S24', 'sku' => 'SGS24', 'price' => 899.99, 'cost' => 680.00, 'stock' => 18, 'category' => 'Electronics', 'status' => 'Active'],
            ['id' => 3, 'name' => 'MacBook Pro 14"', 'sku' => 'MBP14', 'price' => 1999.99, 'cost' => 1500.00, 'stock' => 12, 'category' => 'Electronics', 'status' => 'Active'],
            ['id' => 4, 'name' => 'AirPods Pro', 'sku' => 'APP2', 'price' => 249.99, 'cost' => 180.00, 'stock' => 45, 'category' => 'Audio', 'status' => 'Active'],
            ['id' => 5, 'name' => 'Nike Air Max 90', 'sku' => 'NAM90', 'price' => 129.99, 'cost' => 65.00, 'stock' => 67, 'category' => 'Footwear', 'status' => 'Active'],
            ['id' => 6, 'name' => 'Levi\'s 501 Jeans', 'sku' => 'LV501', 'price' => 79.99, 'cost' => 35.00, 'stock' => 89, 'category' => 'Clothing', 'status' => 'Active']
        ];

        return view('admin.products', compact('products'));
    }

    public function inventory()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $inventory = [
            ['id' => 1, 'product' => 'iPhone 15 Pro', 'sku' => 'IPH15P', 'current_stock' => 25, 'minimum_stock' => 10, 'maximum_stock' => 100, 'reorder_point' => 15, 'status' => 'Good'],
            ['id' => 2, 'product' => 'Samsung Galaxy S24', 'sku' => 'SGS24', 'current_stock' => 5, 'minimum_stock' => 15, 'maximum_stock' => 80, 'reorder_point' => 20, 'status' => 'Low Stock'],
            ['id' => 3, 'product' => 'MacBook Pro 14"', 'sku' => 'MBP14', 'current_stock' => 12, 'minimum_stock' => 8, 'maximum_stock' => 50, 'reorder_point' => 12, 'status' => 'Good'],
            ['id' => 4, 'product' => 'AirPods Pro', 'sku' => 'APP2', 'current_stock' => 2, 'minimum_stock' => 20, 'maximum_stock' => 150, 'reorder_point' => 25, 'status' => 'Critical'],
            ['id' => 5, 'product' => 'Nike Air Max 90', 'sku' => 'NAM90', 'current_stock' => 67, 'minimum_stock' => 30, 'maximum_stock' => 200, 'reorder_point' => 40, 'status' => 'Good']
        ];

        return view('admin.inventory', compact('inventory'));
    }

    public function sales()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $sales = [
            ['id' => 'TXN001', 'date' => '2024-01-15 14:30:22', 'customer' => 'John Smith', 'items' => 3, 'subtotal' => 1329.97, 'tax' => 106.40, 'total' => 1436.37, 'payment' => 'Credit Card', 'cashier' => 'Alice Johnson'],
            ['id' => 'TXN002', 'date' => '2024-01-15 14:25:15', 'customer' => 'Sarah Wilson', 'items' => 2, 'subtotal' => 179.98, 'tax' => 14.40, 'total' => 194.38, 'payment' => 'Cash', 'cashier' => 'Bob Smith'],
            ['id' => 'TXN003', 'date' => '2024-01-15 14:18:45', 'customer' => 'Mike Johnson', 'items' => 1, 'subtotal' => 999.99, 'tax' => 80.00, 'total' => 1079.99, 'payment' => 'Debit Card', 'cashier' => 'Alice Johnson'],
            ['id' => 'TXN004', 'date' => '2024-01-15 14:12:33', 'customer' => 'Emily Davis', 'items' => 4, 'subtotal' => 289.96, 'tax' => 23.20, 'total' => 313.16, 'payment' => 'Credit Card', 'cashier' => 'Carol Brown'],
            ['id' => 'TXN005', 'date' => '2024-01-15 14:05:18', 'customer' => 'Robert Brown', 'items' => 2, 'subtotal' => 329.98, 'tax' => 26.40, 'total' => 356.38, 'payment' => 'Cash', 'cashier' => 'Bob Smith']
        ];

        return view('admin.sales', compact('sales'));
    }

    public function customers()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $customers = [
            ['id' => 1, 'name' => 'John Smith', 'email' => 'john.smith@email.com', 'phone' => '+1 (555) 123-4567', 'total_purchases' => 15, 'total_spent' => 4567.89, 'last_visit' => '2024-01-15', 'status' => 'VIP'],
            ['id' => 2, 'name' => 'Sarah Wilson', 'email' => 'sarah.wilson@email.com', 'phone' => '+1 (555) 234-5678', 'total_purchases' => 8, 'total_spent' => 1234.56, 'last_visit' => '2024-01-14', 'status' => 'Regular'],
            ['id' => 3, 'name' => 'Mike Johnson', 'email' => 'mike.johnson@email.com', 'phone' => '+1 (555) 345-6789', 'total_purchases' => 23, 'total_spent' => 7890.12, 'last_visit' => '2024-01-13', 'status' => 'VIP'],
            ['id' => 4, 'name' => 'Emily Davis', 'email' => 'emily.davis@email.com', 'phone' => '+1 (555) 456-7890', 'total_purchases' => 5, 'total_spent' => 567.34, 'last_visit' => '2024-01-12', 'status' => 'New'],
            ['id' => 5, 'name' => 'Robert Brown', 'email' => 'robert.brown@email.com', 'phone' => '+1 (555) 567-8901', 'total_purchases' => 12, 'total_spent' => 2345.67, 'last_visit' => '2024-01-11', 'status' => 'Regular']
        ];

        return view('admin.customers', compact('customers'));
    }

    public function categories()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $categories = [
            ['id' => 1, 'name' => 'Electronics', 'description' => 'Smartphones, laptops, tablets and electronic devices', 'products_count' => 156, 'status' => 'Active'],
            ['id' => 2, 'name' => 'Clothing', 'description' => 'Men\'s and women\'s apparel and fashion accessories', 'products_count' => 234, 'status' => 'Active'],
            ['id' => 3, 'name' => 'Food & Beverage', 'description' => 'Snacks, drinks, and food items', 'products_count' => 89, 'status' => 'Active'],
            ['id' => 4, 'name' => 'Home & Garden', 'description' => 'Home improvement and gardening supplies', 'products_count' => 167, 'status' => 'Active'],
            ['id' => 5, 'name' => 'Sports & Outdoors', 'description' => 'Athletic equipment and outdoor gear', 'products_count' => 78, 'status' => 'Active'],
            ['id' => 6, 'name' => 'Books & Media', 'description' => 'Books, magazines, movies and music', 'products_count' => 145, 'status' => 'Active']
        ];

        return view('admin.categories', compact('categories'));
    }

    public function reports()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $reports = [
            'daily_sales' => 15750.00,
            'weekly_sales' => 87450.00,
            'monthly_sales' => 345600.00,
            'yearly_sales' => 2456789.00,
            'top_products' => [
                ['name' => 'iPhone 15 Pro', 'quantity' => 45, 'revenue' => 44999.55],
                ['name' => 'Samsung Galaxy S24', 'quantity' => 38, 'revenue' => 34199.62],
                ['name' => 'AirPods Pro', 'quantity' => 67, 'revenue' => 16749.33],
                ['name' => 'MacBook Pro 14"', 'quantity' => 12, 'revenue' => 23999.88]
            ],
            'sales_by_category' => [
                ['category' => 'Electronics', 'sales' => 125600.00, 'percentage' => 45.2],
                ['category' => 'Clothing', 'sales' => 78900.00, 'percentage' => 28.4],
                ['category' => 'Food & Beverage', 'sales' => 34500.00, 'percentage' => 12.4],
                ['category' => 'Sports & Outdoors', 'sales' => 23400.00, 'percentage' => 8.4],
                ['category' => 'Home & Garden', 'sales' => 15600.00, 'percentage' => 5.6]
            ]
        ];

        return view('admin.reports', compact('reports'));
    }

    public function staff()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $staff = [
            ['id' => 1, 'name' => 'Alice Johnson', 'role' => 'Store Manager', 'email' => 'alice.johnson@store.com', 'phone' => '+1 (555) 111-2222', 'hire_date' => '2022-01-15', 'status' => 'Active', 'sales_today' => 5, 'total_sales' => 2456.78],
            ['id' => 2, 'name' => 'Bob Smith', 'role' => 'Senior Cashier', 'email' => 'bob.smith@store.com', 'phone' => '+1 (555) 222-3333', 'hire_date' => '2022-03-20', 'status' => 'Active', 'sales_today' => 8, 'total_sales' => 1876.45],
            ['id' => 3, 'name' => 'Carol Brown', 'role' => 'Cashier', 'email' => 'carol.brown@store.com', 'phone' => '+1 (555) 333-4444', 'hire_date' => '2023-06-10', 'status' => 'Active', 'sales_today' => 6, 'total_sales' => 1234.56],
            ['id' => 4, 'name' => 'David Wilson', 'role' => 'Inventory Specialist', 'email' => 'david.wilson@store.com', 'phone' => '+1 (555) 444-5555', 'hire_date' => '2023-01-08', 'status' => 'Active', 'sales_today' => 0, 'total_sales' => 0.00],
            ['id' => 5, 'name' => 'Eva Martinez', 'role' => 'Assistant Manager', 'email' => 'eva.martinez@store.com', 'phone' => '+1 (555) 555-6666', 'hire_date' => '2022-09-15', 'status' => 'Active', 'sales_today' => 4, 'total_sales' => 1987.65]
        ];

        return view('admin.staff', compact('staff'));
    }

    public function settings()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $settings = [
            'store_info' => [
                'name' => 'TechMart POS System',
                'address' => '123 Main Street, Downtown City',
                'phone' => '+1 (555) 123-4567',
                'email' => 'info@techmart.com',
                'tax_rate' => 8.0,
                'currency' => 'USD'
            ],
            'pos_settings' => [
                'receipt_footer' => 'Thank you for shopping with us!',
                'auto_print_receipt' => true,
                'barcode_scanner' => true,
                'customer_display' => false,
                'cash_drawer' => true
            ],
            'payment_methods' => [
                ['name' => 'Cash', 'enabled' => true],
                ['name' => 'Credit Card', 'enabled' => true],
                ['name' => 'Debit Card', 'enabled' => true],
                ['name' => 'Digital Wallet', 'enabled' => false],
                ['name' => 'Gift Card', 'enabled' => true]
            ]
        ];

        return view('admin.settings', compact('settings'));
    }
}