@extends('layouts.admin')

@section('title', 'Edit Product')
@section('page-title', 'Edit Product')

@section('content')
<div class="max-w-2xl">
    <div class="card-gradient rounded-xl p-6 shadow-lg">
        <form action="{{ route('admin.products.update', $product['id']) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Product Name</label>
                <input type="text" name="name" id="name" value="{{ $product['name'] }}" required 
                       class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                       placeholder="Enter product name">
            </div>
            
            <div>
                <label for="price" class="block text-sm font-medium text-slate-700 mb-2">Price</label>
                <input type="number" name="price" id="price" value="{{ $product['price'] }}" step="0.01" required 
                       class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                       placeholder="0.00">
            </div>
            
            <div>
                <label for="stock" class="block text-sm font-medium text-slate-700 mb-2">Stock Quantity</label>
                <input type="number" name="stock" id="stock" value="{{ $product['stock'] }}" required 
                       class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                       placeholder="0">
            </div>
            
            <div>
                <label for="category" class="block text-sm font-medium text-slate-700 mb-2">Category</label>
                <select name="category" id="category" required 
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300">
                    <option value="Electronics" {{ $product['category'] === 'Electronics' ? 'selected' : '' }}>Electronics</option>
                    <option value="Home" {{ $product['category'] === 'Home' ? 'selected' : '' }}>Home</option>
                    <option value="Office" {{ $product['category'] === 'Office' ? 'selected' : '' }}>Office</option>
                    <option value="Clothing" {{ $product['category'] === 'Clothing' ? 'selected' : '' }}>Clothing</option>
                    <option value="Books" {{ $product['category'] === 'Books' ? 'selected' : '' }}>Books</option>
                </select>
            </div>
            
            <div>
                <label for="description" class="block text-sm font-medium text-slate-700 mb-2">Description</label>
                <textarea name="description" id="description" rows="4" 
                          class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                          placeholder="Enter product description">{{ $product['description'] ?? '' }}</textarea>
            </div>
            
            <div class="flex space-x-4">
                <button type="submit" class="btn-primary text-white px-6 py-3 rounded-lg font-semibold hover:opacity-90 transition duration-300">
                    Update Product
                </button>
                <a href="{{ route('admin.products') }}" class="bg-slate-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-slate-600 transition duration-300">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection