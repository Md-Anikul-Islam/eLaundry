<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'shipping_address' => 'required|string',

            'delivery_type' => 'required|string',
            'delivery_charge' => 'required|numeric',

            'order_items' => 'required|array',
            'order_items.*.service_id' => 'required|integer',
            'order_items.*.quantity' => 'required|integer',


            'payment_method' => 'required|string',
            'payment_status' => 'required|string',
            'payment_amount' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        // Generate an invoice number using the current timestamp and a random 4-digit number
        $invoice_number = 'INV-' . time() . rand(1000, 9999);

        // Create the order
        $order = Order::create([
            'user_id' => $request->user_id,
            'invoice_number' => $invoice_number,
            'order_date' => $request->order_date,
            'total_amount' => $request->total_amount,
            'shipping_address' => $request->shipping_address,
            'delivery_type' => $request->delivery_type,
            'delivery_charge' => $request->delivery_charge,
            'status' => 'pending',
        ]);

        // Create the order items
        $orderItems = [];
        foreach ($request->order_items as $item) {
            // Fetch the service details based on service_id
            $service = \App\Models\Service::find($item['service_id']);

            if ($service) {
                // If the service exists, create the order item
                $orderItem = OrderItem::create([
                    'order_id' => $order->id,
                    'service_id' => $item['service_id'],
                    'quantity' => $item['quantity'],
                    'price' => $service->price,  // Fetch price from the service table
                ]);
                //$orderItems[] = $orderItem;
                $orderItems[] = [
                    'id' => $orderItem->id,
                    'quantity' => $orderItem->quantity,
                    'price' => $orderItem->price,
                    'title' => $service->title,
                    'details' => $service->details,
                    'image' => $service->image
                ];
            } else {
                // Handle case where service is not found (you can return an error or skip)
                return response()->json(['message' => 'Service not found for service_id ' . $item['service_id']], 404);
            }
        }

        // Create the payment
        Payment::create([
            'order_id' => $order->id,
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_status,
            'payment_date' => now(),
            'payment_amount' => $request->payment_amount,
        ]);

        return response()->json([
            'id' => $order->id,
            'user_id' => $order->user_id,
            'invoice_number' => $order->invoice_number,
            'order_date' => $order->order_date,
            'total_amount' => $order->total_amount,
            'shipping_address' => $order->shipping_address,
            'status' => $order->status,
            'payment_method' => $order->payment->payment_method ?? null, // Fetch from payment
            'delivery_type' => $order->delivery_type,
            'delivery_charge' => $order->delivery_charge,
            'created_at' => $order->created_at,
            'updated_at' => $order->updated_at,
            'order_items' => $orderItems
        ], 201);
    }

    public function myOrder()
    {
        $orders = Order::where('user_id', auth()->user()->id)
            ->with('orderItems.service', 'payment')
            ->latest()
            ->get();

        $formattedOrders = $orders->map(function ($order) {
            return [
                'id' => $order->id,
                'user_id' => $order->user_id,
                'invoice_number' => $order->invoice_number,
                'order_date' => $order->order_date,
                'total_amount' => $order->total_amount,
                'shipping_address' => $order->shipping_address,
                'status' => $order->status,
                'payment_method' => $order->payment->payment_method ?? null, // Fetch from payment
                'delivery_type' => $order->delivery_type,
                'delivery_charge' => $order->delivery_charge,
                'created_at' => $order->created_at,
                'updated_at' => $order->updated_at,
                'order_items' => $order->orderItems->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'quantity' => $item->quantity,
                        'price' => $item->price,
                        'title' => $item->service->title ?? null,
                        'details' => $item->service->details ?? null,
                        'image' => $item->service->image ?? null,
                    ];
                })
            ];
        });

        return response()->json($formattedOrders);
    }

}
