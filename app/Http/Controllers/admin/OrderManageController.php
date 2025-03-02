<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
    public function index()
    {
        $order = Order::with('orderItems.service', 'payment')->latest()->get();
        return view('admin.pages.order.index', compact('order'));
    }

    public function show($id)
    {
        $order = Order::with('user','orderItems.service', 'payment')->find($id);
        return view('admin.pages.order.show', compact('order'));

    }



}
