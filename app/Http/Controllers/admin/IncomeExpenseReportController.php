<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class IncomeExpenseReportController extends Controller
{
    public function income(Request $request)
    {
        // Initialize the query to get orders
        $ordersQuery = Order::where('status','=','completed')->with('orderItems')->latest();
        // Filter by Date Range if both start_date and end_date are provided
        if ($request->has('start_date') && $request->has('end_date') && $request->start_date && $request->end_date) {
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
            // Filter orders by the provided date range (inclusive)
            $ordersQuery->whereBetween('order_date', [$start_date, $end_date]);
        }
        $orders = $ordersQuery->paginate(100);
        return view('admin.pages.account.income', compact('orders'));
    }
}
