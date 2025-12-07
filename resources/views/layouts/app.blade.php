<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Store Management')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-5px); box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen">
    <nav class="gradient-bg shadow-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-white">Store Management</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('home') }}" class="text-white hover:text-blue-200 transition duration-300">Home</a>
                    <a href="{{ route('admin.login') }}" class="bg-white bg-opacity-20 text-white px-4 py-2 rounded-lg hover:bg-opacity-30 transition duration-300">Admin Panel</a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gradient-to-r from-slate-800 to-slate-900 text-white mt-20">
        <div class="max-w-7xl mx-auto px-4 py-12">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">Store Management</h3>
                    <p class="text-slate-300">Professional inventory and user management system for modern businesses.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-slate-300">
                        <li><a href="#" class="hover:text-white transition">About</a></li>
                        <li><a href="#" class="hover:text-white transition">Contact</a></li>
                        <li><a href="#" class="hover:text-white transition">Support</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Services</h4>
                    <ul class="space-y-2 text-slate-300">
                        <li><a href="#" class="hover:text-white transition">Inventory Management</a></li>
                        <li><a href="#" class="hover:text-white transition">User Management</a></li>
                        <li><a href="#" class="hover:text-white transition">Reports</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact</h4>
                    <div class="text-slate-300 space-y-2">
                        <p>Email: info@store.com</p>
                        <p>Phone: (555) 123-4567</p>
                        <p>Address: 123 Business St</p>
                    </div>
                </div>
            </div>
            <div class="border-t border-slate-700 mt-8 pt-8 text-center text-slate-300">
                <p>&copy; {{ date('Y') }} Store Management. All rights reserved.</p>
                <p class="mt-2">Made with ❤️ by LaraCopilot</p>
            </div>
        </div>
    </footer>
</body>
</html>