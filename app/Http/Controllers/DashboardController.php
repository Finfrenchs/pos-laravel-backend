<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function getTotals()
    {
        $totalProducts = Product::count();
        $totalUsers = User::count();
        $totalOrders = Order::count();

        // $totalCategories = Product::select('category', DB::raw('count(*) as total'))
        //     ->groupBy('category')
        //     ->get();

        $totalCategories = Product::select('category')
            ->distinct()
            ->get()
            ->count();
        // $totalCategories = Product::select(DB::raw('COUNT(DISTINCT category) as total_categories'))
        //     ->first()
        //     ->total_categories;

        return [
            'total_products' => $totalProducts,
            'total_users' => $totalUsers,
            'total_orders' => $totalOrders,
            'total_categories' => $totalCategories,
        ];
    }

    public function showDashboard()
    {
        $totals = $this->getTotals();

        // Return the view with the correct view name
        return view('pages.app.dashboard-pos', compact('totals'));
    }
}
