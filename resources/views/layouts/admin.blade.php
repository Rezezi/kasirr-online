<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - TechMart POS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .sidebar-gradient { background: linear-gradient(180deg, #1e3c72 0%, #2a5298 100%); }
        .card-shadow { box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .hover-scale { transition: transform 0.2s; }
        .hover-scale:hover { transform: scale(1.02); }
        .animate-slide-in { animation: slideIn 0.3s ease-out; }
        @keyframes slideIn { from { opacity: 0; transform: translateX(-20px); } to { opacity: 1; transform: translateX(0); } }
        .gradient-text { background: linear-gradient(135deg, #667eea, #764ba2); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 sidebar-gradient text-white flex-shrink-0">
            <div class="p-6 border-b border-blue-400/20">
                <div class="flex items-center">
                    <i class="fas fa-cash-register text-2xl text-blue-300 mr-3"></i>
                    <div>
                        <h1 class="font-bold text-lg">TechMart POS</h1>
                        <p class="text-blue-200 text-sm">Admin Panel</p>
                    </div>
                </div>
            </div>
            
            <nav class="mt-6">
                <div class="px-4">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-blue-100 hover:bg-blue-600/30 hover:text-white rounded-lg transition-all duration-300 mb-2 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600/50 text-white' : '' }}">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.pos') }}" class="flex items-center px-4 py-3 text-blue-100 hover:bg-blue-600/30 hover:text-white rounded-lg transition-all duration-300 mb-2 {{ request()->routeIs('admin.pos') ? 'bg-blue-600/50 text-white' : '' }}">
                        <i class="fas fa-cash-register mr-3"></i>
                        <span>POS System</span>
                    </a>
                    <a href="{{ route('admin.products') }}" class="flex items-center px-4 py-3 text-blue-100 hover:bg-blue-600/30 hover:text-white rounded-lg transition-all duration-300 mb-2 {{ request()->routeIs('admin.products') ? 'bg-blue-600/50 text-white' : '' }}">
                        <i class="fas fa-box mr-3"></i>
                        <span>Products</span>
                    </a>
                    <a href="{{ route('admin.inventory') }}" class="flex items-center px-4 py-3 text-blue-100 hover:bg-blue-600/30 hover:text-white rounded-lg transition-all duration-300 mb-2 {{ request()->routeIs('admin.inventory') ? 'bg-blue-600/50 text-white' : '' }}">
                        <i class="fas fa-boxes mr-3"></i>
                        <span>Inventory</span>
                    </a>
                    <a href="{{ route('admin.sales') }}" class="flex items-center px-4 py-3 text-blue-100 hover:bg-blue-600/30 hover:text-white rounded-lg transition-all duration-300 mb-2 {{ request()->routeIs('admin.sales') ? 'bg-blue-600/50 text-white' : '' }}">
                        <i class="fas fa-chart-line mr-3"></i>
                        <span>Sales</span>
                    </a>
                    <a href="{{ route('admin.customers') }}" class="flex items-center px-4 py-3 text-blue-100 hover:bg-blue-600/30 hover:text-white rounded-lg transition-all duration-300 mb-2 {{ request()->routeIs('admin.customers') ? 'bg-blue-600/50 text-white' : '' }}">
                        <i class="fas fa-users mr-3"></i>
                        <span>Customers</span>
                    </a>
                    <a href="{{ route('admin.categories') }}" class="flex items-center px-4 py-3 text-blue-100 hover:bg-blue-600/30 hover:text-white rounded-lg transition-all duration-300 mb-2 {{ request()->routeIs('admin.categories') ? 'bg-blue-600/50 text-white' : '' }}">
                        <i class="fas fa-tags mr-3"></i>
                        <span>Categories</span>
                    </a>
                    <a href="{{ route('admin.reports') }}" class="flex items-center px-4 py-3 text-blue-100 hover:bg-blue-600/30 hover:text-white rounded-lg transition-all duration-300 mb-2 {{ request()->routeIs('admin.reports') ? 'bg-blue-600/50 text-white' : '' }}">
                        <i class="fas fa-file-alt mr-3"></i>
                        <span>Reports</span>
                    </a>
                    <a href="{{ route('admin.staff') }}" class="flex items-center px-4 py-3 text-blue-100 hover:bg-blue-600/30 hover:text-white rounded-lg transition-all duration-300 mb-2 {{ request()->routeIs('admin.staff') ? 'bg-blue-600/50 text-white' : '' }}">
                        <i class="fas fa-user-tie mr-3"></i>
                        <span>Staff</span>
                    </a>
                    <a href="{{ route('admin.settings') }}" class="flex items-center px-4 py-3 text-blue-100 hover:bg-blue-600/30 hover:text-white rounded-lg transition-all duration-300 mb-2 {{ request()->routeIs('admin.settings') ? 'bg-blue-600/50 text-white' : '' }}">
                        <i class="fas fa-cog mr-3"></i>
                        <span>Settings</span>
                    </a>
                </div>
            </nav>

            <div class="absolute bottom-0 w-64 p-4 border-t border-blue-400/20">
                <a href="{{ route('home') }}" class="flex items-center px-4 py-2 text-blue-100 hover:bg-blue-600/30 hover:text-white rounded-lg transition-all duration-300 mb-2">
                    <i class="fas fa-arrow-left mr-3"></i>
                    <span>Back to Website</span>
                </a>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center px-4 py-2 text-blue-100 hover:bg-red-600/30 hover:text-white rounded-lg transition-all duration-300">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-lg border-b border-gray-200">
                <div class="px-6 py-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-bold gradient-text">@yield('page-title', 'Dashboard')</h1>
                            <p class="text-gray-600 text-sm">@yield('page-description', 'Welcome to TechMart POS Admin Panel')</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="text-right">
                                <p class="text-sm font-medium text-gray-900">{{ session('admin_user.name') ?? 'Admin User' }}</p>
                                <p class="text-xs text-gray-500">{{ session('admin_user.role') ?? 'Administrator' }}</p>
                            </div>
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">
                                {{ substr(session('admin_user.name') ?? 'A', 0, 1) }}
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gradient-to-br from-gray-50 to-blue-50 p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Add smooth transitions to all elements
            $('.animate-slide-in').each(function(index) {
                $(this).delay(index * 100).queue(function(next) {
                    $(this).addClass('animate-slide-in');
                    next();
                });
            });
        });
    </script>
</body>
</html>