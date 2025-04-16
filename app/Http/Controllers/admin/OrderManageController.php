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
        $orders = Order::with('user', 'orderItems')->latest()->paginate(10);
        return view('admin.pages.order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('user', 'orderItems','payment')->findOrFail($id);
        return view('admin.pages.order.show', compact('order'));
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
