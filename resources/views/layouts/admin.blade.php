<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .sidebar-gradient { background: linear-gradient(180deg, #1e293b 0%, #334155 100%); }
        .card-gradient { background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%); }
        .btn-primary { background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); }
        .btn-success { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
        .btn-danger { background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); }
        .btn-warning { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-blue-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 sidebar-gradient shadow-2xl">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-white">Admin Panel</h2>
                <p class="text-slate-300 text-sm mt-1">{{ session('admin_user.role') ?? 'User' }} Portal</p>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 text-white hover:bg-white hover:bg-opacity-10 transition duration-300 {{ request()->routeIs('admin.dashboard') ? 'bg-white bg-opacity-20' : '' }}">
                    <span>📊 Dashboard</span>
                </a>
                <a href="{{ route('admin.users') }}" class="flex items-center px-6 py-3 text-white hover:bg-white hover:bg-opacity-10 transition duration-300 {{ request()->routeIs('admin.users*') ? 'bg-white bg-opacity-20' : '' }}">
                    <span>👥 Users</span>
                </a>
                <a href="{{ route('admin.products') }}" class="flex items-center px-6 py-3 text-white hover:bg-white hover:bg-opacity-10 transition duration-300 {{ request()->routeIs('admin.products*') ? 'bg-white bg-opacity-20' : '' }}">
                    <span>📦 Products</span>
                </a>
            </nav>
            <div class="absolute bottom-0 w-64 p-6">
                <a href="{{ route('home') }}" class="block w-full text-center bg-white bg-opacity-20 text-white py-2 rounded-lg hover:bg-opacity-30 transition duration-300 mb-3">
                    🏠 Back to Website
                </a>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-red-500 bg-opacity-80 text-white py-2 rounded-lg hover:bg-opacity-100 transition duration-300">
                        🚪 Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-hidden">
            <header class="bg-white shadow-lg border-b">
                <div class="px-6 py-4">
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl font-semibold text-slate-800">@yield('page-title', 'Dashboard')</h1>
                        <div class="flex items-center space-x-4">
                            <span class="text-slate-600">Welcome, {{ session('admin_user.name') ?? 'User' }}</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">{{ session('admin_user.role') ?? 'User' }}</span>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>