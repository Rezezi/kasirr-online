@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-description', 'Overview of your POS system performance and key metrics')

@section('content')
<div class="space-y-8">
    <!-- Key Metrics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 text-white shadow-lg hover-scale">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium">Today's Sales</p>
                    <p class="text-3xl font-bold">${{ number_format($stats['today_sales'], 2) }}</p>
                    <p class="text-blue-200 text-sm">{{ $stats['today_transactions'] }} transactions</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-dollar-sign text-2xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl p-6 text-white shadow-lg hover-scale">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-emerald-100 text-sm font-medium">Total Products</p>
                    <p class="text-3xl font-bold">{{ number_format($stats['total_products']) }}</p>
                    <p class="text-emerald-200 text-sm">{{ $stats['low_stock_alerts'] }} low stock alerts</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-boxes text-2xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 text-white shadow-lg hover-scale">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm font-medium">Total Customers</p>
                    <p class="text-3xl font-bold">{{ number_format($stats['total_customers']) }}</p>
                    <p class="text-purple-200 text-sm">Active customer base</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-users text-2xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl p-6 text-white shadow-lg hover-scale">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-orange-100 text-sm font-medium">Monthly Revenue</p>
                    <p class="text-3xl font-bold">${{ number_format($stats['monthly_revenue'], 0) }}</p>
                    <p class="text-orange-200 text-sm">Avg: ${{ number_format($stats['average_transaction'], 2) }}</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-chart-line text-2xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Sales Chart -->
        <div class="bg-white rounded-2xl p-6 shadow-lg">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900">Sales Overview</h3>
                <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option>Last 7 days</option>
                    <option>Last 30 days</option>
                    <option>Last 3 months</option>
                </select>
            </div>
            <div class="h-64">
                <canvas id="salesChart" width="400" height="200"></canvas>
            </div>
        </div>

        <!-- Recent Sales -->
        <div class="bg-white rounded-2xl p-6 shadow-lg">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900">Recent Sales</h3>
                <a href="{{ route('admin.sales') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View All</a>
            </div>
            <div class="space-y-4">
                @foreach($recent_sales as $sale)
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-200">
                    <div>
                        <p class="font-semibold text-gray-900">{{ $sale['id'] }}</p>
                        <p class="text-sm text-gray-600">{{ $sale['customer'] }}</p>
                        <p class="text-xs text-gray-500">{{ $sale['time'] }}</p>
                    </div>
                    <div class="text-right">
                        <p class="font-bold text-gray-900">${{ number_format($sale['amount'], 2) }}</p>
                        <p class="text-sm text-gray-600">{{ $sale['items'] }} items</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Low Stock Alerts and Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Low Stock Alerts -->
        <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-lg">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900 flex items-center">
                    <i class="fas fa-exclamation-triangle text-orange-500 mr-2"></i>
                    Low Stock Alerts
                </h3>
                <a href="{{ route('admin.inventory') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Manage Inventory</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Product</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">SKU</th>
                            <th class="text-center py-3 px-4 font-semibold text-gray-700">Current</th>
                            <th class="text-center py-3 px-4 font-semibold text-gray-700">Minimum</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($low_stock as $item)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="py-3 px-4 font-medium text-gray-900">{{ $item['name'] }}</td>
                            <td class="py-3 px-4 text-gray-600">{{ $item['sku'] }}</td>
                            <td class="py-3 px-4 text-center">
                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-sm font-medium">
                                    {{ $item['current'] }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-center text-gray-600">{{ $item['minimum'] }}</td>
                            <td class="py-3 px-4 text-gray-600">{{ $item['category'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-2xl p-6 shadow-lg">
            <h3 class="text-xl font-bold text-gray-900 mb-6">Quick Actions</h3>
            <div class="space-y-4">
                <a href="{{ route('admin.pos') }}" class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white p-4 rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 block text-center">
                    <i class="fas fa-cash-register text-xl mb-2"></i>
                    <p class="font-semibold">Open POS</p>
                </a>
                
                <a href="{{ route('admin.products') }}" class="w-full bg-gradient-to-r from-emerald-500 to-emerald-600 text-white p-4 rounded-xl hover:from-emerald-600 hover:to-emerald-700 transition-all duration-300 block text-center">
                    <i class="fas fa-plus text-xl mb-2"></i>
                    <p class="font-semibold">Add Product</p>
                </a>
                
                <a href="{{ route('admin.reports') }}" class="w-full bg-gradient-to-r from-purple-500 to-purple-600 text-white p-4 rounded-xl hover:from-purple-600 hover:to-purple-700 transition-all duration-300 block text-center">
                    <i class="fas fa-chart-bar text-xl mb-2"></i>
                    <p class="font-semibold">View Reports</p>
                </a>
                
                <a href="{{ route('admin.settings') }}" class="w-full bg-gradient-to-r from-gray-500 to-gray-600 text-white p-4 rounded-xl hover:from-gray-600 hover:to-gray-700 transition-all duration-300 block text-center">
                    <i class="fas fa-cog text-xl mb-2"></i>
                    <p class="font-semibold">Settings</p>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
// Sales Chart
const ctx = document.getElementById('salesChart').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [{
            label: 'Sales',
            data: [12000, 15000, 13500, 18000, 16500, 22000, 19500],
            borderColor: 'rgb(59, 130, 246)',
            backgroundColor: 'rgba(59, 130, 246, 0.1)',
            tension: 0.4,
            fill: true
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(0, 0, 0, 0.05)'
                }
            },
            x: {
                grid: {
                    display: false
                }
            }
        }
    }
});
</script>
@endsection