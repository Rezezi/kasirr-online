<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - TechMart POS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <style>
        .login-gradient { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .card-shadow { box-shadow: 0 25px 50px rgba(0,0,0,0.15); }
        .animate-slide-up { animation: slideUp 0.6s ease-out; }
        @keyframes slideUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="login-gradient min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl card-shadow p-8 animate-slide-up">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="flex justify-center items-center mb-4">
                    <i class="fas fa-cash-register text-4xl text-blue-600 mr-3"></i>
                    <h1 class="text-3xl font-bold text-gray-800">TechMart POS</h1>
                </div>
                <h2 class="text-xl font-semibold text-gray-600">Admin Portal</h2>
                <p class="text-gray-500 mt-2">Sign in to access your dashboard</p>
            </div>

            <!-- Demo Credentials -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-4 mb-6 border border-blue-200">
                <h3 class="font-semibold text-blue-800 mb-3 flex items-center">
                    <i class="fas fa-key mr-2"></i>Demo Credentials
                </h3>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between items-center bg-white rounded-lg p-2">
                        <span class="font-medium">Admin:</span>
                        <span class="text-blue-600">admin@posystem.com / admin123</span>
                    </div>
                    <div class="flex justify-between items-center bg-white rounded-lg p-2">
                        <span class="font-medium">Manager:</span>
                        <span class="text-blue-600">manager@posystem.com / manager123</span>
                    </div>
                    <div class="flex justify-between items-center bg-white rounded-lg p-2">
                        <span class="font-medium">Cashier:</span>
                        <span class="text-blue-600">cashier@posystem.com / cashier123</span>
                    </div>
                </div>
            </div>

            <!-- Login Form -->
            <form action="/admin/login" method="POST" class="space-y-6">
                @csrf
                
                @if($errors->any())
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                            <span class="text-red-700 font-medium">{{ $errors->first() }}</span>
                        </div>
                    </div>
                @endif

                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email Address</label>
                    <div class="relative">
                        <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="email" id="email" name="email" required 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                               placeholder="Enter your email">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                    <div class="relative">
                        <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="password" id="password" name="password" required 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                               placeholder="Enter your password">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <span class="ml-2 text-gray-600 text-sm">Remember me</span>
                    </label>
                    <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium transition-colors duration-300">
                        Forgot password?
                    </a>
                </div>

                <button type="submit" 
                        class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 rounded-lg font-semibold hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                    <i class="fas fa-sign-in-alt mr-2"></i>Sign In
                </button>
            </form>

            <!-- Footer -->
            <div class="mt-8 pt-6 border-t border-gray-200 text-center">
                <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800 font-medium transition-colors duration-300">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Website
                </a>
            </div>
        </div>

        <!-- Quick Login Buttons -->
        <div class="mt-6 grid grid-cols-3 gap-3">
            <button onclick="quickLogin('admin@posystem.com', 'admin123')" 
                    class="bg-white/10 backdrop-blur-sm border border-white/20 text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-white/20 transition-all duration-300">
                Quick Admin
            </button>
            <button onclick="quickLogin('manager@posystem.com', 'manager123')" 
                    class="bg-white/10 backdrop-blur-sm border border-white/20 text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-white/20 transition-all duration-300">
                Quick Manager
            </button>
            <button onclick="quickLogin('cashier@posystem.com', 'cashier123')" 
                    class="bg-white/10 backdrop-blur-sm border border-white/20 text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-white/20 transition-all duration-300">
                Quick Cashier
            </button>
        </div>
    </div>

    <script>
        function quickLogin(email, password) {
            document.getElementById('email').value = email;
            document.getElementById('password').value = password;
        }
    </script>
</body>
</html>