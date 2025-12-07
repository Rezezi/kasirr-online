@extends('layouts.admin')

@section('title', 'Inventory')
@section('page-title', 'Inventory Management')
@section('page-description', 'Monitor stock levels and manage inventory alerts')

@section('content')
<div class="space-y-6">
    <!-- Inventory Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium">Total Items</p>
                    <p class="text-3xl font-bold">1,247</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-boxes text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm font-medium">In Stock</p>
                    <p class="text-3xl font-bold">1,089</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-check-circle text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-2xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-yellow-100 text-sm font-medium">Low Stock</p>
                    <p class="text-3xl font-bold">23</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-exclamation-triangle text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-red-500 to-red-600 rounded-2xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-red-100 text-sm font-medium">Out of Stock</p>
                    <p class="text-3xl font-bold">8</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-times-circle text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter and Actions -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div class="flex items-center space-x-4">
            <div class="relative">
                <input type="text" placeholder="Search inventory..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent w-64">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
            <select class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">All Status</option>
                <option value="good">Good</option>
                <option value="low">Low Stock</option>
                <option value="critical">Critical</option>
                <option value="out">Out of Stock</option>
            </select>
        </div>
        <div class="flex space-x-3">
            <button class="bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 shadow-lg">
                <i class="fas fa-plus mr-2"></i>Stock Adjustment
            </button>
            <button class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300 shadow-lg">
                <i class="fas fa-download mr-2"></i>Export Report
            </button>
        </div>
    </div>

    <!-- Inventory Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-gray-50 to-blue-50">
                    <tr>
                        <th class="text-left py-4 px-6 font-semibold text-gray-700">Product</th>
                        <th class="text-left py-4 px-6 font-semibold text-gray-700">SKU</th>
                        <th class="text-center py-4 px-6 font-semibold text-gray-700">Current Stock</th>
                        <th class="text-center py-4 px-6 font-semibold text-gray-700">Min Stock</th>
                        <th class="text-center py-4 px-6 font-semibold text-gray-700">Max Stock</th>
                        <th class="text-center py-4 px-6 font-semibold text-gray-700">Reorder Point</th>
                        <th class="text-center py-4 px-6 font-semibold text-gray-700">Status</th>
                        <th class="text-center py-4 px-6 font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($inventory as $item)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-purple-100 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-mobile-alt text-blue-600"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">{{ $item['product'] }}</p>
                                    <p class="text-sm text-gray-500">ID: {{ $item['id'] }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-gray-600 font-mono">{{ $item['sku'] }}</td>
                        <td class="py-4 px-6 text-center">
                            <span class="text-2xl font-bold text-gray-900">{{ $item['current_stock'] }}</span>
                        </td>
                        <td class="py-4 px-6 text-center text-gray-600">{{ $item['minimum_stock'] }}</td>
                        <td class="py-4 px-6 text-center text-gray-600">{{ $item['maximum_stock'] }}</td>
                        <td class="py-4 px-6 text-center text-gray-600">{{ $item['reorder_point'] }}</td>
                        <td class="py-4 px-6 text-center">
                            @if($item['status'] == 'Good')
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Good</span>
                            @elseif($item['status'] == 'Low Stock')
                                <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">Low Stock</span>
                            @elseif($item['status'] == 'Critical')
                                <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium">Critical</span>
                            @endif
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="text-blue-600 hover:text-blue-800 p-2 hover:bg-blue-50 rounded-lg transition-all duration-200" title="Adjust Stock">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-green-600 hover:text-green-800 p-2 hover:bg-green-50 rounded-lg transition-all duration-200" title="Reorder">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                                <button class="text-purple-600 hover:text-purple-800 p-2 hover:bg-purple-50 rounded-lg transition-all duration-200" title="History">
                                    <i class="fas fa-history"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Stock Level Chart -->
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <h3 class="text-xl font-bold text-gray-900 mb-6">Stock Level Overview</h3>
        <div class="h-64">
            <canvas id="stockChart" width="400" height="200"></canvas>
        </div>
    </div>
</div>

<script>
// Stock Level Chart
const ctx = document.getElementById('stockChart').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['iPhone 15 Pro', 'Samsung Galaxy S24', 'MacBook Pro 14"', 'AirPods Pro', 'Nike Air Max 90'],
        datasets: [{
            label: 'Current Stock',
            data: [25, 5, 12, 2, 67],
            backgroundColor: [
                'rgba(34, 197, 94, 0.8)',
                'rgba(239, 68, 68, 0.8)',
                'rgba(34, 197, 94, 0.8)',
                'rgba(239, 68, 68, 0.8)',
                'rgba(34, 197, 94, 0.8)'
            ],
            borderColor: [
                'rgb(34, 197, 94)',
                'rgb(239, 68, 68)',
                'rgb(34, 197, 94)',
                'rgb(239, 68, 68)',
                'rgb(34, 197, 94)'
            ],
            borderWidth: 1
        }, {
            label: 'Minimum Stock',
            data: [10, 15, 8, 20, 30],
            backgroundColor: 'rgba(156, 163, 175, 0.5)',
            borderColor: 'rgb(156, 163, 175)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'top',
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