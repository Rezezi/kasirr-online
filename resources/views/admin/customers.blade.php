@extends('layouts.admin')

@section('title', 'Customers')
@section('page-title', 'Customer Management')
@section('page-description', 'Manage customer relationships and purchase history')

@section('content')
<div class="space-y-6">
    <!-- Customer Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium">Total Customers</p>
                    <p class="text-3xl font-bold">3,456</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-users text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm font-medium">VIP Customers</p>
                    <p class="text-3xl font-bold">89</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-crown text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm font-medium">New This Month</p>
                    <p class="text-3xl font-bold">156</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-user-plus text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-orange-100 text-sm font-medium">Avg. Spend</p>
                    <p class="text-3xl font-bold">$234</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-dollar-sign text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter and Actions -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div class="flex items-center space-x-4">
            <div class="relative">
                <input type="text" placeholder="Search customers..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent w-64">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
            <select class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">All Status</option>
                <option value="vip">VIP</option>
                <option value="regular">Regular</option>
                <option value="new">New</option>
            </select>
        </div>
        <div class="flex space-x-3">
            <button class="bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 shadow-lg">
                <i class="fas fa-plus mr-2"></i>Add Customer
            </button>
            <button class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300 shadow-lg">
                <i class="fas fa-download mr-2"></i>Export
            </button>
        </div>
    </div>

    <!-- Customers Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-gray-50 to-blue-50">
                    <tr>
                        <th class="text-left py-4 px-6 font-semibold text-gray-700">Customer</th>
                        <th class="text-left py-4 px-6 font-semibold text-gray-700">Contact</th>
                        <th class="text-center py-4 px-6 font-semibold text-gray-700">Purchases</th>
                        <th class="text-right py-4 px-6 font-semibold text-gray-700">Total Spent</th>
                        <th class="text-center py-4 px-6 font-semibold text-gray-700">Last Visit</th>
                        <th class="text-center py-4 px-6 font-semibold text-gray-700">Status</th>
                        <th class="text-center py-4 px-6 font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($customers as $customer)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold mr-4">
                                    {{ substr($customer['name'], 0, 1) }}
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">{{ $customer['name'] }}</p>
                                    <p class="text-sm text-gray-500">ID: {{ $customer['id'] }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div>
                                <p class="text-gray-900">{{ $customer['email'] }}</p>
                                <p class="text-sm text-gray-500">{{ $customer['phone'] }}</p>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-center">
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">{{ $customer['total_purchases'] }}</span>
                        </td>
                        <td class="py-4 px-6 text-right">
                            <span class="font-bold text-gray-900">${{ number_format($customer['total_spent'], 2) }}</span>
                        </td>
                        <td class="py-4 px-6 text-center text-gray-600">{{ $customer['last_visit'] }}</td>
                        <td class="py-4 px-6 text-center">
                            @if($customer['status'] == 'VIP')
                                <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-medium flex items-center justify-center">
                                    <i class="fas fa-crown mr-1"></i>VIP
                                </span>
                            @elseif($customer['status'] == 'Regular')
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Regular</span>
                            @else
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">New</span>
                            @endif
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="text-blue-600 hover:text-blue-800 p-2 hover:bg-blue-50 rounded-lg transition-all duration-200" title="View Profile">
                                    <i class="fas fa-user"></i>
                                </button>
                                <button class="text-green-600 hover:text-green-800 p-2 hover:bg-green-50 rounded-lg transition-all duration-200" title="Purchase History">
                                    <i class="fas fa-history"></i>
                                </button>
                                <button class="text-purple-600 hover:text-purple-800 p-2 hover:bg-purple-50 rounded-lg transition-all duration-200" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Customer Analytics -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Customer Acquisition -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-6">Customer Acquisition</h3>
            <div class="h-64">
                <canvas id="acquisitionChart" width="400" height="200"></canvas>
            </div>
        </div>

        <!-- Customer Segments -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-6">Customer Segments</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-4 h-4 bg-purple-500 rounded mr-3"></div>
                        <span class="text-gray-700">VIP Customers</span>
                    </div>
                    <div class="text-right">
                        <span class="font-bold text-gray-900">89</span>
                        <span class="text-sm text-gray-500 ml-2">(2.6%)</span>
                    </div>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-purple-500 h-2 rounded-full" style="width: 2.6%"></div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-4 h-4 bg-green-500 rounded mr-3"></div>
                        <span class="text-gray-700">Regular Customers</span>
                    </div>
                    <div class="text-right">
                        <span class="font-bold text-gray-900">2,234</span>
                        <span class="text-sm text-gray-500 ml-2">(64.6%)</span>
                    </div>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-green-500 h-2 rounded-full" style="width: 64.6%"></div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-4 h-4 bg-blue-500 rounded mr-3"></div>
                        <span class="text-gray-700">New Customers</span>
                    </div>
                    <div class="text-right">
                        <span class="font-bold text-gray-900">1,133</span>
                        <span class="text-sm text-gray-500 ml-2">(32.8%)</span>
                    </div>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-500 h-2 rounded-full" style="width: 32.8%"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Customer Acquisition Chart
const ctx = document.getElementById('acquisitionChart').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'New Customers',
            data: [45, 52, 38, 67, 73, 89],
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