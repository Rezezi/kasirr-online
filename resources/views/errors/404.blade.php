@extends('layouts.app')

@section('title', 'Page Not Found')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full text-center">
        <div class="card-gradient rounded-xl shadow-2xl p-8">
            <div class="text-6xl mb-4">🔍</div>
            <h1 class="text-4xl font-bold text-slate-800 mb-4">404</h1>
            <h2 class="text-xl font-semibold text-slate-700 mb-4">Page Not Found</h2>
            <p class="text-slate-600 mb-8">The page you're looking for doesn't exist or has been moved.</p>
            <div class="space-y-3">
                <a href="{{ route('home') }}" class="block w-full btn-primary text-white py-3 rounded-lg font-semibold hover:opacity-90 transition duration-300">
                    🏠 Back to Home
                </a>
                <a href="{{ route('admin.login') }}" class="block w-full bg-slate-500 text-white py-3 rounded-lg font-semibold hover:bg-slate-600 transition duration-300">
                    🔐 Admin Panel
                </a>
            </div>
        </div>
    </div>
</div>
@endsection