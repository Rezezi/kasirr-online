@extends('layouts.admin')

@section('title', 'POS System')
@section('page-title', 'Point of Sale')
@section('page-description', 'Process sales transactions and manage customer orders')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 h-full">
    <!-- Product Selection -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg p-6">
        <!-- Categories -->
        <div class="mb-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold text-gray-900">Categories</h3>
                <div class="relative">
                    <input type="text" placeholder="Search products..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                @foreach($categories as $category)
                <button onclick="filterProducts({{ $category['id'] }})" class="category-btn {{ $category['color'] }} text-white p-4 rounded-xl hover:opacity-90 transition-all duration-300 text-center">
                    <p class="font-semibold">{{ $category['name'] }}</p>
                </button>
                @endforeach
            </div>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 max-h-96 overflow-y-auto">
            @foreach($products as $product)
            <div class="product-item bg-gray-50 rounded-xl p-4 hover:bg-gray-100 transition-all duration-300 cursor-pointer border border-gray-200 hover:border-blue-300" 
                 data-category="{{ $product['category_id'] }}"
                 onclick="addToCart({{ json_encode($product) }})">
                <div class="bg-gradient-to-br from-blue-100 to-purple-100 rounded-lg h-24 mb-3 flex items-center justify-center">
                    <i class="fas fa-mobile-alt text-2xl text-blue-600"></i>
                </div>
                <h4 class="font-semibold text-gray-900 text-sm mb-1 truncate">{{ $product['name'] }}</h4>
                <p class="text-blue-600 font-bold">${{ number_format($product['price'], 2) }}</p>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Cart & Checkout -->
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-bold text-gray-900">Current Order</h3>
            <button onclick="clearCart()" class="text-red-600 hover:text-red-800 text-sm font-medium">
                <i class="fas fa-trash mr-1"></i>Clear
            </button>
        </div>

        <!-- Cart Items -->
        <div id="cart-items" class="space-y-3 mb-6 max-h-64 overflow-y-auto">
            <div class="text-center text-gray-500 py-8">
                <i class="fas fa-shopping-cart text-4xl mb-3"></i>
                <p>No items in cart</p>
            </div>
        </div>

        <!-- Cart Summary -->
        <div class="border-t border-gray-200 pt-4 space-y-3">
            <div class="flex justify-between text-gray-600">
                <span>Subtotal:</span>
                <span id="subtotal">$0.00</span>
            </div>
            <div class="flex justify-between text-gray-600">
                <span>Tax (8%):</span>
                <span id="tax">$0.00</span>
            </div>
            <div class="flex justify-between text-xl font-bold text-gray-900 border-t pt-3">
                <span>Total:</span>
                <span id="total">$0.00</span>
            </div>
        </div>

        <!-- Customer Selection -->
        <div class="mt-6">
            <label class="block text-gray-700 font-semibold mb-2">Customer</label>
            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">Walk-in Customer</option>
                <option value="1">John Smith</option>
                <option value="2">Sarah Wilson</option>
                <option value="3">Mike Johnson</option>
            </select>
        </div>

        <!-- Payment Method -->
        <div class="mt-4">
            <label class="block text-gray-700 font-semibold mb-2">Payment Method</label>
            <div class="grid grid-cols-2 gap-2">
                <button class="payment-btn bg-blue-100 text-blue-800 p-3 rounded-lg hover:bg-blue-200 transition-all duration-300 border border-blue-300" data-method="cash">
                    <i class="fas fa-money-bill-wave mb-1"></i>
                    <p class="text-sm font-medium">Cash</p>
                </button>
                <button class="payment-btn bg-green-100 text-green-800 p-3 rounded-lg hover:bg-green-200 transition-all duration-300 border border-green-300" data-method="card">
                    <i class="fas fa-credit-card mb-1"></i>
                    <p class="text-sm font-medium">Card</p>
                </button>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mt-6 space-y-3">
            <button onclick="processPayment()" class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white py-3 rounded-lg font-semibold hover:from-green-600 hover:to-green-700 transition-all duration-300 shadow-lg">
                <i class="fas fa-check mr-2"></i>Complete Sale
            </button>
            <button onclick="holdOrder()" class="w-full bg-gradient-to-r from-yellow-500 to-yellow-600 text-white py-3 rounded-lg font-semibold hover:from-yellow-600 hover:to-yellow-700 transition-all duration-300">
                <i class="fas fa-pause mr-2"></i>Hold Order
            </button>
        </div>
    </div>
</div>

<script>
let cart = [];
let selectedPayment = 'cash';

function filterProducts(categoryId) {
    const products = document.querySelectorAll('.product-item');
    products.forEach(product => {
        if (categoryId === 'all' || product.dataset.category == categoryId) {
            product.style.display = 'block';
        } else {
            product.style.display = 'none';
        }
    });
}

function addToCart(product) {
    const existingItem = cart.find(item => item.id === product.id);
    
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({...product, quantity: 1});
    }
    
    updateCartDisplay();
}

function removeFromCart(productId) {
    cart = cart.filter(item => item.id !== productId);
    updateCartDisplay();
}

function updateQuantity(productId, change) {
    const item = cart.find(item => item.id === productId);
    if (item) {
        item.quantity += change;
        if (item.quantity <= 0) {
            removeFromCart(productId);
        } else {
            updateCartDisplay();
        }
    }
}

function updateCartDisplay() {
    const cartContainer = document.getElementById('cart-items');
    
    if (cart.length === 0) {
        cartContainer.innerHTML = `
            <div class="text-center text-gray-500 py-8">
                <i class="fas fa-shopping-cart text-4xl mb-3"></i>
                <p>No items in cart</p>
            </div>
        `;
    } else {
        cartContainer.innerHTML = cart.map(item => `
            <div class="flex items-center justify-between bg-gray-50 rounded-lg p-3">
                <div class="flex-1">
                    <h4 class="font-semibold text-gray-900 text-sm">${item.name}</h4>
                    <p class="text-blue-600 font-medium">$${item.price.toFixed(2)}</p>
                </div>
                <div class="flex items-center space-x-2">
                    <button onclick="updateQuantity(${item.id}, -1)" class="w-6 h-6 bg-red-100 text-red-600 rounded-full text-xs hover:bg-red-200">-</button>
                    <span class="font-semibold">${item.quantity}</span>
                    <button onclick="updateQuantity(${item.id}, 1)" class="w-6 h-6 bg-green-100 text-green-600 rounded-full text-xs hover:bg-green-200">+</button>
                </div>
            </div>
        `).join('');
    }
    
    updateTotals();
}

function updateTotals() {
    const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    const tax = subtotal * 0.08;
    const total = subtotal + tax;
    
    document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)}`;
    document.getElementById('tax').textContent = `$${tax.toFixed(2)}`;
    document.getElementById('total').textContent = `$${total.toFixed(2)}`;
}

function clearCart() {
    cart = [];
    updateCartDisplay();
}

function processPayment() {
    if (cart.length === 0) {
        alert('Cart is empty!');
        return;
    }
    
    const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0) * 1.08;
    
    if (confirm(`Process payment of $${total.toFixed(2)} via ${selectedPayment}?`)) {
        alert('Payment processed successfully!');
        clearCart();
    }
}

function holdOrder() {
    if (cart.length === 0) {
        alert('Cart is empty!');
        return;
    }
    
    alert('Order held successfully!');
    clearCart();
}

// Payment method selection
document.querySelectorAll('.payment-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.payment-btn').forEach(b => b.classList.remove('ring-2', 'ring-blue-500'));
        this.classList.add('ring-2', 'ring-blue-500');
        selectedPayment = this.dataset.method;
    });
});

// Initialize with cash selected
document.querySelector('[data-method="cash"]').classList.add('ring-2', 'ring-blue-500');
</script>
@endsection