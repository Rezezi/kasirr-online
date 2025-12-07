<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $features = [
            [
                'title' => 'Real-Time POS System',
                'description' => 'Process transactions instantly with our lightning-fast point of sale system designed for retail efficiency.',
                'icon' => 'fas fa-cash-register'
            ],
            [
                'title' => 'Inventory Management',
                'description' => 'Track stock levels, manage suppliers, and automate reorder points to never run out of products.',
                'icon' => 'fas fa-boxes'
            ],
            [
                'title' => 'Sales Analytics',
                'description' => 'Comprehensive reporting and analytics to understand your business performance and growth trends.',
                'icon' => 'fas fa-chart-line'
            ],
            [
                'title' => 'Customer Management',
                'description' => 'Build customer relationships with detailed profiles, purchase history, and loyalty programs.',
                'icon' => 'fas fa-users'
            ],
            [
                'title' => 'Multi-Payment Options',
                'description' => 'Accept cash, cards, digital wallets, and mobile payments with integrated payment processing.',
                'icon' => 'fas fa-credit-card'
            ],
            [
                'title' => 'Cloud-Based Security',
                'description' => 'Secure cloud infrastructure ensures your data is protected and accessible from anywhere.',
                'icon' => 'fas fa-shield-alt'
            ]
        ];

        $testimonials = [
            [
                'name' => 'Sarah Johnson',
                'business' => 'Johnson\'s Grocery Store',
                'message' => 'This POS system transformed our checkout process. Sales increased by 30% with faster transactions.',
                'rating' => 5
            ],
            [
                'name' => 'Mike Chen',
                'business' => 'Tech Gadgets Plus',
                'message' => 'The inventory management features saved us thousands in overstock. Highly recommended!',
                'rating' => 5
            ],
            [
                'name' => 'Lisa Rodriguez',
                'business' => 'Fashion Forward Boutique',
                'message' => 'Customer management tools helped us build loyalty programs that keep customers coming back.',
                'rating' => 5
            ]
        ];

        return view('welcome', compact('features', 'testimonials'));
    }
}