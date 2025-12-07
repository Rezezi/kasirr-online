@extends('layouts.app')

@section('title', 'Store Management System')

@section('content')
<div class="relative overflow-hidden">
    <!-- Hero Section -->
    <div class="gradient-bg">
        <div class="max-w-7xl mx-auto px-4 py-20 sm:py-24">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 animate-fade-in">
                    Store Management System
                </h1>
                <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto">
                    Streamline your business operations with our comprehensive inventory and user management solution. Built for modern retailers.
                </p>
                <div class="space-x-4">
                    <a href="{{ route('admin.login') }}" class="inline-block bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-blue-50 transition duration-300 card-hover">
                        Access Admin Panel
                    </a>
                    <a href="#features" class="inline-block bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition duration-300">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div id="features" class="py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Powerful Features</h2>
                <p class="text-xl text-slate-600">Everything you need to manage your store efficiently</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="card-gradient rounded-xl p-8 shadow-lg card-hover">
                    <div class="text-4xl mb-4">👥</div>
                    <h3 class="text-xl font-semibold mb-4 text-slate-800">User Management</h3>
                    <p class="text-slate-600">Manage admin and cashier roles with comprehensive user controls and permissions.</p>
                </div>
                <div class="card-gradient rounded-xl p-8 shadow-lg card-hover">
                    <div class="text-4xl mb-4">📦</div>
                    <h3 class="text-xl font-semibold mb-4 text-slate-800">Product Management</h3>
                    <p class="text-slate-600">Complete CRUD operations for inventory management with real-time stock tracking.</p>
                </div>
                <div class="card-gradient rounded-xl p-8 shadow-lg card-hover">
                    <div class="text-4xl mb-4">📊</div>
                    <h3 class="text-xl font-semibold mb-4 text-slate-800">Analytics Dashboard</h3>
                    <p class="text-slate-600">Real-time insights and reporting to help you make informed business decisions.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div class="bg-gradient-to-r from-slate-800 to-slate-900 py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Built for Modern Retailers</h2>
                    <p class="text-slate-300 text-lg mb-6">
                        Our store management system is designed with simplicity and efficiency in mind. Whether you're managing a small boutique or a large retail operation, our platform scales with your business needs.
                    </p>
                    <ul class="space-y-3 text-slate-300">
                        <li class="flex items-center"><span class="text-green-400 mr-3">✓</span> Role-based access control</li>
                        <li class="flex items-center"><span class="text-green-400 mr-3">✓</span> Real-time inventory tracking</li>
                        <li class="flex items-center"><span class="text-green-400 mr-3">✓</span> Comprehensive reporting</li>
                        <li class="flex items-center"><span class="text-green-400 mr-3">✓</span> User-friendly interface</li>
                    </ul>
                </div>
                <div class="text-center">
                    <div class="bg-white bg-opacity-10 rounded-xl p-8">
                        <h3 class="text-2xl font-bold text-white mb-4">Ready to Get Started?</h3>
                        <p class="text-slate-300 mb-6">Access the admin panel with demo credentials</p>
                        <div class="space-y-2 text-sm text-slate-300">
                            <p><strong>Admin:</strong> admin@store.com / admin123</p>
                            <p><strong>Cashier:</strong> cashier@store.com / cashier123</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Get in Touch</h2>
                <p class="text-xl text-slate-600">Have questions? We're here to help.</p>
            </div>
            <div class="grid md:grid-cols-2 gap-12">
                <div class="card-gradient rounded-xl p-8 shadow-lg">
                    <h3 class="text-xl font-semibold mb-6 text-slate-800">Contact Information</h3>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <span class="text-2xl mr-4">📧</span>
                            <div>
                                <p class="font-semibold text-slate-800">Email</p>
                                <p class="text-slate-600">info@store.com</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl mr-4">📞</span>
                            <div>
                                <p class="font-semibold text-slate-800">Phone</p>
                                <p class="text-slate-600">(555) 123-4567</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl mr-4">📍</span>
                            <div>
                                <p class="font-semibold text-slate-800">Address</p>
                                <p class="text-slate-600">123 Business Street, City, State 12345</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-gradient rounded-xl p-8 shadow-lg">
                    <h3 class="text-xl font-semibold mb-6 text-slate-800">Send us a Message</h3>
                    <form class="space-y-4">
                        <input type="text" placeholder="Your Name" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <input type="email" placeholder="Your Email" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <textarea placeholder="Your Message" rows="4" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                        <button type="submit" class="w-full btn-primary text-white py-3 rounded-lg font-semibold hover:opacity-90 transition duration-300">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Smooth scrolling for anchor links
    $('a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if( target.length ) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 80
            }, 1000);
        }
    });
});
</script>
@endsection