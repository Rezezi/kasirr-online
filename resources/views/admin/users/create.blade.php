@extends('layouts.admin')

@section('title', 'Create User')
@section('page-title', 'Create New User')

@section('content')
<div class="max-w-2xl">
    <div class="card-gradient rounded-xl p-6 shadow-lg">
        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Full Name</label>
                <input type="text" name="name" id="name" required 
                       class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                       placeholder="Enter full name">
            </div>
            
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email Address</label>
                <input type="email" name="email" id="email" required 
                       class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                       placeholder="Enter email address">
            </div>
            
            <div>
                <label for="password" class="block text-sm font-medium text-slate-700 mb-2">Password</label>
                <input type="password" name="password" id="password" required 
                       class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                       placeholder="Enter password">
            </div>
            
            <div>
                <label for="role" class="block text-sm font-medium text-slate-700 mb-2">Role</label>
                <select name="role" id="role" required 
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
                    <option value="">Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="cashier">Cashier</option>
                </select>
            </div>
            
            <div>
                <label for="status" class="block text-sm font-medium text-slate-700 mb-2">Status</label>
                <select name="status" id="status" required 
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
                    <option value="">Select Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            
            <div class="flex space-x-4">
                <button type="submit" class="btn-success text-white px-6 py-3 rounded-lg font-semibold hover:opacity-90 transition duration-300">
                    Create User
                </button>
                <a href="{{ route('admin.users') }}" class="bg-slate-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-slate-600 transition duration-300">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection