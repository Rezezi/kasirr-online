@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section id="home" class="hero-gradient text-white py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-black/10"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-8 animate-slide-in">
                <h1 class="text-5xl lg:text-7xl font-bold leading-tight">
                    Revolutionary 
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-300">POS System</span>
                    for Modern Retail
                </h1>
                <p class="text-xl lg:text-2xl text-blue-100 leading-relaxed">
                    Transform your retail business with our comprehensive point of sale solution. Streamline operations, boost sales, and manage inventory with intelligent automation.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('admin.login') }}" class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:from-purple-700 hover:to-pink-700 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:scale-105 text-center">
                        <i class="fas fa-rocket mr-2"></i>Start Free Trial
                    </a>
                    <a href="#features" class="bg-white/10 backdrop-blur-sm border border-white/20 text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-white/20 transition-all duration-300 text-center">
                        <i class="fas fa-play mr-2"></i>Watch Demo
                    </a>
                </div>
                <div class="flex items-center space-x-8 pt-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold">500K+</div>
                        <div class="text-blue-200 text-sm">Transactions Daily</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold">10K+</div>
                        <div class="text-blue-200 text-sm">Active Businesses</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold">99.9%</div>
                        <div class="text-blue-200 text-sm">Uptime</div>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="animate-float">
                    <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 shadow-2xl border border-white/20">
                        <div class="space-y-6">
                            <div class="flex items-center justify-between">
                                <h3 class="text-xl font-semibold">Live POS Dashboard</h3>
                                <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-white/10 rounded-xl p-4 text-center">
                                    <div class="text-2xl font-bold">$15,750</div>
                                    <div class="text-blue-200 text-sm">Today's Sales</div>
                                </div>
                                <div class="bg-white/10 rounded-xl p-4 text-center">
                                    <div class="text-2xl font-bold">89</div>
                                    <div class="text-blue-200 text-sm">Transactions</div>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between bg-white/10 rounded-lg p-3">
                                    <span>iPhone 15 Pro</span>
                                    <span class="font-semibold">$999.99</span>
                                </div>
                                <div class="flex items-center justify-between bg-white/10 rounded-lg p-3">
                                    <span>Samsung Galaxy S24</span>
                                    <span class="font-semibold">$899.99</span>
                                </div>
                                <div class="flex items-center justify-between bg-white/10 rounded-lg p-3">
                                    <span>AirPods Pro</span>
                                    <span class="font-semibold">$249.99</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                Powerful Features for 
                <span class="text-gradient">Smart Retail</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Everything you need to run a successful retail business, from point of sale to inventory management, all in one comprehensive platform.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($features as $feature)
            <div class="card-hover bg-gradient-to-br from-white to-blue-50 rounded-2xl p-8 shadow-lg border border-blue-100">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                    <i class="{{ $feature['icon'] }} text-2xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $feature['title'] }}</h3>
                <p class="text-gray-600 leading-relaxed">{{ $feature['description'] }}</p>
                <div class="mt-6">
                    <a href="#" class="text-blue-600 font-semibold hover:text-purple-600 transition-colors duration-300">
                        Learn More <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-24 bg-gradient-to-br from-blue-50 to-indigo-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="space-y-8">
                <div>
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                        Built for the 
                        <span class="text-gradient">Future of Retail</span>
                    </h2>
                    <p class="text-xl text-gray-600 leading-relaxed mb-8">
                        TechMart POS is designed by retail experts who understand the challenges of modern commerce. Our platform combines cutting-edge technology with intuitive design to deliver exceptional results.
                    </p>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="bg-white rounded-xl p-6 shadow-lg">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-check text-white text-lg"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">Easy Setup</h4>
                        <p class="text-gray-600 text-sm">Get started in minutes with our simple onboarding process.</p>
                    </div>
                    
                    <div class="bg-white rounded-xl p-6 shadow-lg">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-shield-alt text-white text-lg"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">Secure & Reliable</h4>
                        <p class="text-gray-600 text-sm">Enterprise-grade security with 99.9% uptime guarantee.</p>
                    </div>
                    
                    <div class="bg-white rounded-xl p-6 shadow-lg">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-mobile-alt text-white text-lg"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">Mobile Ready</h4>
                        <p class="text-gray-600 text-sm">Access your business data anywhere, anytime on any device.</p>
                    </div>
                    
                    <div class="bg-white rounded-xl p-6 shadow-lg">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-headset text-white text-lg"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">24/7 Support</h4>
                        <p class="text-gray-600 text-sm">Expert support team available around the clock.</p>
                    </div>
                </div>
            </div>
            
            <div class="relative">
                <div class="bg-gradient-to-br from-blue-600 to-purple-700 rounded-3xl p-8 shadow-2xl">
                    <div class="bg-white rounded-2xl p-6 mb-6">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="font-bold text-gray-900">Sales Performance</h4>
                            <span class="text-green-600 font-semibold">+23.5%</span>
                        </div>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">This Month</span>
                                <span class="font-semibold">$125,340</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-blue-500 to-purple-600 h-2 rounded-full" style="width: 75%"></div>
                            </div>
                            <div class="flex justify-between items-center text-sm text-gray-500">
                                <span>Target: $150,000</span>
                                <span>75% Complete</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 text-white text-center">
                            <div class="text-2xl font-bold">1,247</div>
                            <div class="text-blue-200 text-sm">Products</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 text-white text-center">
                            <div class="text-2xl font-bold">3,456</div>
                            <div class="text-blue-200 text-sm">Customers</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                What Our 
                <span class="text-gradient">Customers Say</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Join thousands of businesses that have transformed their operations with TechMart POS.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($testimonials as $testimonial)
            <div class="card-hover bg-gradient-to-br from-white to-gray-50 rounded-2xl p-8 shadow-lg border border-gray-100">
                <div class="flex items-center mb-6">
                    @for($i = 0; $i < $testimonial['rating']; $i++)
                    <i class="fas fa-star text-yellow-400 text-lg"></i>
                    @endfor
                </div>
                <p class="text-gray-700 leading-relaxed mb-6 italic">"{{ $testimonial['message'] }}"</p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold mr-4">
                        {{ substr($testimonial['name'], 0, 1) }}
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">{{ $testimonial['name'] }}</h4>
                        <p class="text-gray-600 text-sm">{{ $testimonial['business'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-700 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl lg:text-5xl font-bold mb-8">
            Ready to Transform Your Business?
        </h2>
        <p class="text-xl text-blue-100 mb-12 max-w-3xl mx-auto">
            Join thousands of successful retailers using TechMart POS. Start your free trial today and experience the difference.
        </p>
        <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
            <a href="{{ route('admin.login') }}" class="bg-white text-blue-600 px-10 py-4 rounded-full text-lg font-bold hover:bg-gray-100 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:scale-105">
                <i class="fas fa-rocket mr-2"></i>Start Free Trial
            </a>
            <a href="#contact" class="border-2 border-white text-white px-10 py-4 rounded-full text-lg font-bold hover:bg-white hover:text-blue-600 transition-all duration-300">
                <i class="fas fa-phone mr-2"></i>Schedule Demo
            </a>
        </div>
        <div class="mt-12 flex justify-center items-center space-x-8 text-blue-200">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                <span>No Setup Fees</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                <span>30-Day Free Trial</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                <span>Cancel Anytime</span>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-24 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                Get in 
                <span class="text-gradient">Touch</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Have questions? Our team is here to help you get started with TechMart POS.
            </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <div class="space-y-8">
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Contact Information</h3>
                    <div class="space-y-6">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Address</h4>
                                <p class="text-gray-600">123 Business District, Tech City, TC 12345</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-phone text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Phone</h4>
                                <p class="text-gray-600">+1 (555) 123-4567</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-envelope text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Email</h4>
                                <p class="text-gray-600">info@techmartpos.com</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-clock text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Support Hours</h4>
                                <p class="text-gray-600">24/7 Customer Support</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Send us a Message</h3>
                <form class="space-y-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">First Name</label>
                            <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" placeholder="John">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Last Name</label>
                            <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" placeholder="Doe">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Email</label>
                        <input type="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" placeholder="john@company.com">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Subject</label>
                        <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                            <option>General Inquiry</option>
                            <option>Product Demo</option>
                            <option>Technical Support</option>
                            <option>Pricing Information</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Message</label>
                        <textarea rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" placeholder="Tell us how we can help you..."></textarea>
                    </div>
                    
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-lg font-semibold hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                        <i class="fas fa-paper-plane mr-2"></i>Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection