@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="card-gradient rounded-xl p-6 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-600 text-sm">Total Users</p>
                    <p class="text-2xl font-bold text-slate-800">{{ $stats['total_users'] }}</p>
                </div>
                <div class="text-3xl">👥</div>
            </div>
        </div>
        <div class="card-gradient rounded-xl p-6 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-600 text-sm">Total Products</p>
                    <p class="text-2xl font-bold text-slate-800">{{ $stats['total_products'] }}</p>
                </div>
                <div class="text-3xl">📦</div>
            </div>
        </div>
        <div class="card-gradient rounded-xl p-6 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-600 text-sm">Total Sales</p>
                    <p class="text-2xl font-bold text-slate-800">${{ number_format($stats['total_sales'], 2) }}</p>
                </div>
                <div class="text-3xl">💰</div>
            </div>
        </div>
        <div class="card-gradient rounded-xl p-6 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-600 text-sm">Pending Orders</p>
                    <p class="text-2xl font-bold text-slate-800">{{ $stats['pending_orders'] }}</p>
                </div>
                <div class="text-3xl">📋</div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="card-gradient rounded-xl p-6 shadow-lg">
            <h3 class="text-lg font-semibold text-slate-800 mb-4">Sales Overview</h3>
            <canvas id="salesChart" width="400" height="200"></canvas>
        </div>
        <div class="card-gradient rounded-xl p-6 shadow-lg">
            <h3 class="text-lg font-semibold text-slate-800 mb-4">Product Categories</h3>
            <canvas id="categoryChart" width="400" height="200"></canvas>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="card-gradient rounded-xl p-6 shadow-lg">
        <h3 class="text-lg font-semibold text-slate-800 mb-4">Recent Activity</h3>
        <div class="space-y-3">
            <div class="flex items-center p-3 bg-blue-50 rounded-lg">
                <span class="text-blue-600 mr-3">👤</span>
                <div>
                    <p class="font-medium text-slate-800">New user registered</p>
                    <p class="text-sm text-slate-600">2 minutes ago</p>
                </div>
            </div>
            <div class="flex items-center p-3 bg-green-50 rounded-lg">
                <span class="text-green-600 mr-3">📦</span>
                <div>
                    <p class="font-medium text-slate-800">Product "Laptop Pro" updated</p>
                    <p class="text-sm text-slate-600">15 minutes ago</p>
                </div>
            </div>
            <div class="flex items-center p-3 bg-orange-50 rounded-lg">
                <span class="text-orange-600 mr-3">🛒</span>
                <div>
                    <p class="font-medium text-slate-800">New order received</p>
                    <p class="text-sm text-slate-600">1 hour ago</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Sales Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Sales ($)',
                data: [2500, 3200, 2800, 4100, 3600, 4500],
                borderColor: 'rgb(59, 130, 246)',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                tension: 0.4
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Category Chart
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    new Chart(categoryCtx, {
        type: 'doughnut',
        data: {
            labels: ['Electronics', 'Home', 'Office', 'Clothing'],
            datasets: [{
                data: [45, 25, 20, 10],
                backgroundColor: [
                    'rgb(59, 130, 246)',
                    'rgb(16, 185, 129)',
                    'rgb(245, 158, 11)',
                    'rgb(239, 68, 68)'
                ]
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false
        }
    });
});
</script>
@endsection