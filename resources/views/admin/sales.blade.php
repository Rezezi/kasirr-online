@extends('layouts.admin')

@section('title', 'Sales')
@section('page-title', 'Sales Transactions')
@section('page-description', 'View and manage all sales transactions')

@section('content')
<div class="space-y-6">
    <!-- Sales Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm font-medium">Today's Sales</p>
                    <p class="text-3xl font-bold">$15,750</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-dollar-sign text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium">Transactions</p>
                    <p class="text-3xl font-bold">89</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-receipt text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm font-medium">Avg. Transaction</p>
                    <p class="text-3xl font-bold">$177</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-chart-line text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-orange-100 text-sm font-medium">This Month</p>
                    <p class="text-3xl font-bold">$125K</p>
                </div>
                <div class="bg-white/20 rounded-full p-3">
                    <i class="fas fa-calendar text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter and Search -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div class="flex items-center space-x-4">
            <div class="relative">
                <input type="text" placeholder="Search transactions..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent w-64">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
            <select class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">All Payment Methods</option>
                <option value="cash">Cash</option>
                <option value="credit">Credit Card</option>
                <option value="debit">Debit Card</option>
            </select>
            <input type="date" class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>
        <div class="flex space-x-3">
            <button class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300 shadow-lg">
                <i class="fas fa-download mr-2"></i>Export
            </button>
            <button class="bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 shadow-lg">
                <i class="fas fa-plus mr-2"></i>New Sale
            </button>
        </div>
    </div>

    <!-- Sales Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-gray-50 to-blue-50">
                    <tr>
                        <th class="text-left py-4 px-6 font-semibold text-gray-700">Transaction ID</th>
                        <th class="text-left py-4 px-6 font-semibold text-gray-700">Date & Time</th>
                        <th class="text-left py-4 px-6 font-semibold text-gray-700">Customer</th>
                        <th class="text-center py-4 px-6 font-semibold text-gray-700">Items</th>
                        <th class="text-right py-4 px-6 font-semibold text-gray-700">Subtotal</th>
                        <th class="text-right py-4 px-6 font-semibold text-gray-700">Tax</th>
                        <th class="text-right py-4 px-6 font-semibold text-gray-700">Total</th>
                        <th class="text-center py-4 px-6 font-semibold text-gray-700">Payment</th>
                        <th class="text-left py-4 px-6 font-semibold text-gray-700">Cashier</th>
                        <th class="text-center py-4 px-6 font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($sales as $sale)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="py-4 px-6">
                            <span class="font-mono text-blue-600 font-semibold">{{ $sale['id'] }}</span>
                        </td>
                        <td class="py-4 px-6 text-gray-600">{{ $sale['date'] }}</td>
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-sm mr-3">
                                    {{ substr($sale['customer'], 0, 1) }}
                                </div>
                                <span class="font-medium text-gray-900">{{ $sale['customer'] }}</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-center">
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm font-medium">{{ $sale['items'] }}</span>
                        </td>
                        <td class="py-4 px-6 text-right text-gray-600">${{ number_format($sale['subtotal'], 2) }}</td>
                        <td class="py-4 px-6 text-right text-gray-600">${{ number_format($sale['tax'], 2) }}</td>
                        <td class="py-4 px-6 text-right">
                            <span class="font-bold text-gray-900">${{ number_format($sale['total'], 2) }}</span>
                        </td>
                        <td class="py-4 px-6 text-center">
                            @if($sale['payment'] == 'Cash')
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Cash</span>
                            @elseif($sale['payment'] == 'Credit Card')
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">Credit</span>
                            @else
                                <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-medium">Debit</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-gray-600">{{ $sale['cashier'] }}</td>
                        <td class="py-4 px-6">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="text-blue-600 hover:text-blue-800 p-2 hover:bg-blue-50 rounded-lg transition-all duration-200" title="View Receipt">
                                    <i class="fas fa-receipt"></i>
                                </button>
                                <button class="text-green-600 hover:text-green-800 p-2 hover:bg-green-50 rounded-lg transition-all duration-200" title="Print">
                                    <i class="fas fa-print"></i>
                                </button>
                                <button class="text-purple-600 hover:text-purple-800 p-2 hover:bg-purple-50 rounded-lg transition-all duration-200" title="Refund">
                                    <i class="fas fa-undo"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Sales Chart -->
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-bold text-gray-900">Sales Trend</h3>
            <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option>Last 7 days</option>
                <option>Last 30 days</option>
                <option>Last 3 months</option>
            </select>
        </div>
        <div class="h-64">
            <canvas id="salesTrendChart" width="400" height="200"></canvas>
        </div>
    </div>
</div>

<script>
// Sales Trend Chart
const ctx = document.getElementById('salesTrendChart').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan 9', 'Jan 10', 'Jan 11', 'Jan 12', 'Jan 13', 'Jan 14', 'Jan 15'],
        datasets: [{
            label: 'Sales ($)',
            data: [12000, 15000, 13500, 18000, 16500, 22000, 15750],
            borderColor: 'rgb(59, 130, 246)',
            backgroundColor: 'rgba(59, 130, 246, 0.1)',
            tension: 0.4,
            fill: true
        }, {
            label: 'Transactions',
            data: [68, 85, 76, 102, 93, 124, 89],
            borderColor: 'rgb(16, 185, 129)',
            backgroundColor: 'rgba(16, 185, 129, 0.1)',
            tension: 0.4,
            yAxisID: 'y1'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        interaction: {
            mode: 'index',
            intersect: false,
        },
        plugins: {
            legend: {
                position: 'top',
            }
        },
        scales: {
            y: {
                type: 'linear',
                display: true,
                position: 'left',
                grid: {
                    color: 'rgba(0, 0, 0, 0.05)'
                }
            },
            y1: {
                type: 'linear',
                display: true,
                position: 'right',
                grid: {
                    drawOnChartArea: false,
                },
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