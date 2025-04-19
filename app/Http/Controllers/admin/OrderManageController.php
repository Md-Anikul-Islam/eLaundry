<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Yoeunes\Toastr\Facades\Toastr;

class OrderManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('order-manage')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }


    public function index(Request $request)
    {
        // Initialize the query to get orders
        $ordersQuery = Order::with('user', 'orderItems')->latest();
        // Filter by Date Range if both start_date and end_date are provided
        if ($request->has('start_date') && $request->has('end_date') && $request->start_date && $request->end_date) {
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
            // Filter orders by the provided date range (inclusive)
            $ordersQuery->whereBetween('order_date', [$start_date, $end_date]);
        }

        // Filter by Status if status is provided
        if ($request->has('status') && $request->input('status') != '') {
            $status = $request->input('status');
            $ordersQuery->where('status', $status);
        }
        $orders = $ordersQuery->paginate(10);
        return view('admin.pages.order.index', compact('orders'));
    }




    public function show($id)
    {
        $order = Order::with('user', 'orderItems','payment')->findOrFail($id);
        return view('admin.pages.order.show', compact('order'));
    }

    public function changeStatus($id)
    {
        $order = Order::find($id);
        if ($order->status == 'pending') {
            $order->status = 'completed';
            $order->save();
            Toastr::success('Order Status Updated Successfully', 'Success');
        } else {
            $order->status = 'pending';
            $order->save();
            Toastr::success('Order Status Updated Successfully', 'Success');
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        try {
            $order = Order::find($id);
            $order->delete();
            Toastr::success('Order Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }







}
