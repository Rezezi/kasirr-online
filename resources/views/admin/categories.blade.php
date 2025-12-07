@extends('layouts.admin')

@section('title', 'Categories')
@section('page-title', 'Category Management')
@section('page-description', 'Organize products into categories for better management')

@section('content')
<div class="space-y-6">
    <!-- Category Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium">Total Categories</p>
                    <p class="text-3xl font-bold">6</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-tags text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm font-medium">Active Categories</p>
                    <p class="text-3xl font-bold">6</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-check-circle text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm font-medium">Total Products</p>
                    <p class="text-3xl font-bold">869</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-boxes text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-orange-100 text-sm font-medium">Avg Products/Category</p>
                    <p class="text-3xl font-bold">145</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-chart-bar text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div class="relative">
            <input type="text" placeholder="Search categories..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent w-64">
            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
        </div>
        <div class="flex space-x-3">
            <button class="bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 shadow-lg">
                <i class="fas fa-plus mr-2"></i>Add Category
            </button>
            <button class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300 shadow-lg">
                <i class="fas fa-download mr-2"></i>Export
            </button>
        </div>
    </div>

    <!-- Categories Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($categories as $category)
        <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-tag text-white text-lg"></i>
                </div>
                <div class="flex space-x-2">
                    <button class="text-blue-600 hover:text-blue-800 p-2 hover:bg-blue-50 rounded-lg transition-all duration-200" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="text-red-600 hover:text-red-800 p-2 hover:bg-red-50 rounded-lg transition-all duration-200" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            
            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $category['name'] }}</h3>
            <p class="text-gray-600 text-sm mb-4">{{ $category['description'] }}</p>
            
            <div class="flex items-center justify-between">
                <div class="text-center">
                    <p class="text-2xl font-bold text-blue-600">{{ $category['products_count'] }}</p>
                    <p class="text-xs text-gray-500">Products</p>
                </div>
                <div class="text-center">
                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">{{ $category['status'] }}</span>
                </div>
            </div>
            
            <div class="mt-4 pt-4 border-t border-gray-200">
                <div class="flex justify-between items-center">
                    <button class="text-blue-600 hover:text-blue-800 font-medium text-sm transition-colors duration-200">
                        View Products
                    </button>
                    <button class="text-gray-500 hover:text-gray-700 text-sm transition-colors duration-200">
                        Manage
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Category Performance Chart -->
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-bold text-gray-900">Category Performance</h3>
            <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option>Last 30 days</option>
                <option>Last 3 months</option>
                <option>Last year</option>
            </select>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Products by Category -->
            <div>
                <h4 class="text-lg font-semibold text-gray-900 mb-4">Products by Category</h4>
                <div class="h-64">
                    <canvas id="productsChart" width="400" height="200"></canvas>
                </div>
            </div>
            
            <!-- Sales by Category -->
            <div>
                <h4 class="text-lg font-semibold text-gray-900 mb-4">Sales Performance</h4>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-blue-500 rounded mr-3"></div>
                            <span class="text-gray-700">Electronics</span>
                        </div>
                        <div class="text-right">
                            <span class="font-bold text-gray-900">$125,600</span>
                            <span class="text-sm text-green-600 ml-2">+15%</span>
                        </div>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: 45%"></div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-purple-500 rounded mr-3"></div>
                            <span class="text-gray-700">Clothing</span>
                        </div>
                        <div class="text-right">
                            <span class="font-bold text-gray-900">$78,900</span>
                            <span class="text-sm text-green-600 ml-2">+8%</span>
                        </div>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-purple-500 h-2 rounded-full" style="width: 28%"></div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-green-500 rounded mr-3"></div>
                            <span class="text-gray-700">Food & Beverage</span>
                        </div>
                        <div class="text-right">
                            <span class="font-bold text-gray-900">$34,500</span>
                            <span class="text-sm text-red-600 ml-2">-2%</span>
                        </div>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-green-500 h-2 rounded-full" style="width: 12%"></div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-orange-500 rounded mr-3"></div>
                            <span class="text-gray-700">Sports & Outdoors</span>
                        </div>
                        <div class="text-right">
                            <span class="font-bold text-gray-900">$23,400</span>
                            <span class="text-sm text-green-600 ml-2">+12%</span>
                        </div>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-orange-500 h-2 rounded-full" style="width: 8%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Products by Category Chart
const ctx = document.getElementById('productsChart').getContext('2d');
new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Electronics', 'Clothing', 'Food & Beverage', 'Home & Garden', 'Sports & Outdoors', 'Books & Media'],
        datasets: [{
            data: [156, 234, 89, 167, 78, 145],
            backgroundColor: [
                '#3B82F6',
                '#8B5CF6',
                '#10B981',
                '#F59E0B',
                '#EF4444',
                '#6366F1'
            ],
            borderWidth: 0
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    padding: 20,
                    usePointStyle: true
                }
            }
        }
    }
});
</script>
@endsection