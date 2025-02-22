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
                $orderItems[] = $orderItem;
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

        $orderWithDetails = Order::with('orderItems.service', 'payment')->find($order->id);
        return response()->json([
            'message' => 'Order created successfully!',
            'order' => $orderWithDetails
        ], 201);
    }
}
