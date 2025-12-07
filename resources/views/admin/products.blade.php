@extends('layouts.admin')

@section('title', 'Products')
@section('page-title', 'Product Management')
@section('page-description', 'Manage your product catalog and inventory')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div class="flex items-center space-x-4">
            <div class="relative">
                <input type="text" placeholder="Search products..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent w-64">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
            <select class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">All Categories</option>
                <option value="electronics">Electronics</option>
                <option value="clothing">Clothing</option>
                <option value="audio">Audio</option>
                <option value="footwear">Footwear</option>
            </select>
        </div>
        <div class="flex space-x-3">
            <button class="bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 shadow-lg">
                <i class="fas fa-plus mr-2"></i>Add Product
            </button>
            <button class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300 shadow-lg">
                <i class="fas fa-download mr-2"></i>Export
            </button>
        </div>
    </div>

    <!-- Products Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-gray-50 to-blue-50">
                    <tr>
                        <th class="text-left py-4 px-6 font-semibold text-gray-700">Product</th>
                        <th class="text-left py-4 px-6 font-semibold text-gray-700">SKU</th>
                        <th class="text-right py-4 px-6 font-semibold text-gray-700">Price</th>
                        <th class="text-right py-4 px-6 font-semibold text-gray-700">Cost</th>
                        <th class="text-center py-4 px-6 font-semibold text-gray-700">Stock</th>
                        <th class="text-left py-4 px-6 font-semibold text-gray-700">Category</th>
                        <th class="text-center py-4 px-6 font-semibold text-gray-700">Status</th>
                        <th class="text-center py-4 px-6 font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($products as $product)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-purple-100 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-mobile-alt text-blue-600"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">{{ $product['name'] }}</p>
                                    <p class="text-sm text-gray-500">ID: {{ $product['id'] }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-gray-600 font-mono">{{ $product['sku'] }}</td>
                        <td class="py-4 px-6 text-right">
                            <span class="font-semibold text-gray-900">${{ number_format($product['price'], 2) }}</span>
                        </td>
                        <td class="py-4 px-6 text-right">
                            <span class="text-gray-600">${{ number_format($product['cost'], 2) }}</span>
                        </td>
                        <td class="py-4 px-6 text-center">
                            <span class="bg-{{ $product['stock'] > 20 ? 'green' : ($product['stock'] > 10 ? 'yellow' : 'red') }}-100 text-{{ $product['stock'] > 20 ? 'green' : ($product['stock'] > 10 ? 'yellow' : 'red') }}-800 px-3 py-1 rounded-full text-sm font-medium">
                                {{ $product['stock'] }}
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">{{ $product['category'] }}</span>
                        </td>
                        <td class="py-4 px-6 text-center">
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">{{ $product['status'] }}</span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="text-blue-600 hover:text-blue-800 p-2 hover:bg-blue-50 rounded-lg transition-all duration-200" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-green-600 hover:text-green-800 p-2 hover:bg-green-50 rounded-lg transition-all duration-200" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-red-600 hover:text-red-800 p-2 hover:bg-red-50 rounded-lg transition-all duration-200" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="flex items-center justify-between bg-white rounded-lg px-6 py-4 shadow-lg">
        <div class="text-sm text-gray-600">
            Showing 1 to 6 of 1,247 products
        </div>
        <div class="flex items-center space-x-2">
            <button class="px-3 py-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition-all duration-200">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="px-3 py-2 bg-blue-600 text-white rounded-lg">1</button>
            <button class="px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition-all duration-200">2</button>
            <button class="px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition-all duration-200">3</button>
            <span class="px-2 text-gray-500">...</span>
            <button class="px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition-all duration-200">42</button>
            <button class="px-3 py-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition-all duration-200">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</div>
@endsection