@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="card-gradient rounded-xl shadow-2xl p-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-slate-800 mb-2">Admin Login</h2>
                <p class="text-slate-600">Access the admin panel</p>
            </div>

            <!-- Demo Credentials Display -->
            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
                <h3 class="text-sm font-semibold text-blue-800 mb-2">Demo Credentials:</h3>
                <div class="space-y-1 text-sm text-blue-700">
                    <p><strong>Admin:</strong> admin@store.com | admin123</p>
                    <p><strong>Cashier:</strong> cashier@store.com | cashier123</p>
                </div>
            </div>

            @if(session('error'))
                <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <form action="/admin/login" method="POST" class="mt-6 space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email Address</label>
                    <input type="email" name="email" id="email" required 
                           class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                           placeholder="Enter your email">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-2">Password</label>
                    <input type="password" name="password" id="password" required 
                           class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                           placeholder="Enter your password">
                </div>
                <button type="submit" class="w-full btn-primary text-white py-3 rounded-lg font-semibold hover:opacity-90 transition duration-300">
                    Sign In
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800 transition duration-300">
                    ← Back to Home
                </a>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Quick fill buttons for demo
    $('#email').on('focus', function() {
        if (!$(this).val()) {
            $(this).val('admin@store.com');
        }
    });
    
    $('#password').on('focus', function() {
        if (!$(this).val()) {
            $(this).val('admin123');
        }
    });
});
</script>
@endsection