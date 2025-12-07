@extends('layouts.app')

@section('title', 'Server Error')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full text-center">
        <div class="card-gradient rounded-xl shadow-2xl p-8">
            <div class="text-6xl mb-4">⚠️</div>
            <h1 class="text-4xl font-bold text-slate-800 mb-4">500</h1>
            <h2 class="text-xl font-semibold text-slate-700 mb-4">Server Error</h2>
            <p class="text-slate-600 mb-8">Something went wrong on our end. Please try again later.</p>
            <div class="space-y-3">
                <a href="{{ route('home') }}" class="block w-full btn-primary text-white py-3 rounded-lg font-semibold hover:opacity-90 transition duration-300">
                    🏠 Back to Home
                </a>
                <button onclick="window.location.reload()" class="block w-full bg-slate-500 text-white py-3 rounded-lg font-semibold hover:bg-slate-600 transition duration-300">
                    🔄 Try Again
                </button>
            </div>
        </div>
    </div>
</div>
@endsection