<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechMart POS - Advanced Point of Sale System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .hero-gradient { background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
        .animate-float { animation: float 6s ease-in-out infinite; }
        @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-20px); } }
        .text-gradient { background: linear-gradient(135deg, #667eea, #764ba2); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white/90 backdrop-blur-md shadow-lg sticky top-0 z-50 border-b border-blue-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <i class="fas fa-cash-register text-3xl text-gradient mr-3"></i>
                        <span class="font-bold text-2xl text-gradient">TechMart POS</span>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-300 hover:bg-blue-50">Home</a>
                    <a href="#features" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-300 hover:bg-blue-50">Features</a>
                    <a href="#about" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-300 hover:bg-blue-50">About</a>
                    <a href="#contact" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-300 hover:bg-blue-50">Contact</a>
                    <a href="{{ route('admin.login') }}" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-2 rounded-full text-sm font-medium hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                        <i class="fas fa-user-shield mr-2"></i>Admin Portal
                    </a>
                </div>
                <div class="md:hidden flex items-center">
                    <button class="text-gray-700 hover:text-blue-600 focus:outline-none focus:text-blue-600" onclick="toggleMobileMenu()">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="#home" class="block px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-300">Home</a>
                <a href="#features" class="block px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-300">Features</a>
                <a href="#about" class="block px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-300">About</a>
                <a href="#contact" class="block px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-300">Contact</a>
                <a href="{{ route('admin.login') }}" class="block px-3 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg transition-all duration-300 hover:from-blue-700 hover:to-purple-700">
                    <i class="fas fa-user-shield mr-2"></i>Admin Portal
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-gray-900 via-blue-900 to-purple-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="space-y-4">
                    <div class="flex items-center">
                        <i class="fas fa-cash-register text-2xl text-blue-400 mr-3"></i>
                        <span class="font-bold text-xl">TechMart POS</span>
                    </div>
                    <p class="text-gray-300 leading-relaxed">Revolutionary point of sale system designed for modern retail businesses. Streamline operations and boost sales with our comprehensive POS solution.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition-colors duration-300"><i class="fab fa-facebook-f text-lg"></i></a>
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition-colors duration-300"><i class="fab fa-twitter text-lg"></i></a>
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition-colors duration-300"><i class="fab fa-linkedin-in text-lg"></i></a>
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition-colors duration-300"><i class="fab fa-instagram text-lg"></i></a>
                    </div>
                </div>
                <div class="space-y-4">
                    <h3 class="font-bold text-lg text-blue-400">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-300 hover:pl-2">Dashboard</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-300 hover:pl-2">POS System</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-300 hover:pl-2">Inventory</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-300 hover:pl-2">Reports</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-300 hover:pl-2">Settings</a></li>
                    </ul>
                </div>
                <div class="space-y-4">
                    <h3 class="font-bold text-lg text-blue-400">POS Features</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-300 hover:pl-2">Real-time Sales</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-300 hover:pl-2">Inventory Management</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-300 hover:pl-2">Customer Tracking</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-300 hover:pl-2">Sales Analytics</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-300 hover:pl-2">Multi-Payment Support</a></li>
                    </ul>
                </div>
                <div class="space-y-4">
                    <h3 class="font-bold text-lg text-blue-400">Contact Info</h3>
                    <ul class="space-y-3">
                        <li class="flex items-center text-gray-300">
                            <i class="fas fa-map-marker-alt text-blue-400 mr-3"></i>
                            <span>123 Business District, Tech City, TC 12345</span>
                        </li>
                        <li class="flex items-center text-gray-300">
                            <i class="fas fa-phone text-blue-400 mr-3"></i>
                            <span>+1 (555) 123-4567</span>
                        </li>
                        <li class="flex items-center text-gray-300">
                            <i class="fas fa-envelope text-blue-400 mr-3"></i>
                            <span>info@techmartpos.com</span>
                        </li>
                        <li class="flex items-center text-gray-300">
                            <i class="fas fa-clock text-blue-400 mr-3"></i>
                            <span>24/7 Support Available</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bg-black/20 border-t border-gray-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm">© {{ date('Y') }} TechMart POS. All rights reserved.</p>
                    <p class="text-gray-400 text-sm mt-2 md:mt-0">Made with ❤️ by LaraCopilot</p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        // Smooth scrolling for anchor links
        $(document).ready(function() {
            $('a[href^="#"]').on('click', function(event) {
                var target = $(this.getAttribute('href'));
                if(target.length) {
                    event.preventDefault();
                    $('html, body').stop().animate({
                        scrollTop: target.offset().top - 80
                    }, 1000);
                }
            });

            // Add scroll animations
            $(window).scroll(function() {
                $('.card-hover').each(function() {
                    var elementTop = $(this).offset().top;
                    var elementBottom = elementTop + $(this).outerHeight();
                    var viewportTop = $(window).scrollTop();
                    var viewportBottom = viewportTop + $(window).height();

                    if (elementBottom > viewportTop && elementTop < viewportBottom) {
                        $(this).addClass('animate__animated animate__fadeInUp');
                    }
                });
            });
        });
    </script>
</body>
</html>