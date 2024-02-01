<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //index
    public function index()
    {
        $orders = Order::with('cashier')->orderBy('created_at', 'desc')->paginate(10);

        return view('pages.orders.index', compact('orders'));
    }

    //view
    public function show($id)
    {
        $order = Order::with('cashier')->findOrFail($id);

        //order items
        $orderItems = OrderItem::with('product')->where('order_id', $id)->get();

        return view('pages.orders.view', compact('order', 'orderItems'));
    }

    // public function getSalesReport(Request $request)
    // {
    //     $startDate = $request->input('start_date');
    //     $endDate = $request->input('end_date');

    //     $salesReport = Order::whereBetween('transaction_time', [$startDate, $endDate])
    //         ->get();

    //     return response()->json(['sales_report' => $salesReport]);
    // }
}
