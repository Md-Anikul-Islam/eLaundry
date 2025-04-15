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

        // Validate request data
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required|exists:users,id',
            'address' => 'required|string|max:255',
            'pic_spot' => 'required|string|max:255',
            'delivery_speed_type' => 'required|string|max:255',
            'detergent_type' => 'required|string|max:255',
            'order_items' => 'required|array',
            'order_items.*.bag_name' => 'required|string|max:255',
            'order_items.*.quantity' => 'required|integer|min:1',
            'payment_method' => 'required|string|max:255',
            'total_amount' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Create Order
        $order = Order::create([
            'customer_id' => $request->customer_id,
            'address' => $request->address,
            'pic_spot' => $request->pic_spot,
            'instructions' => $request->instructions,
            'delivery_speed_type' => $request->delivery_speed_type,
            'detergent_type' => $request->detergent_type,
            'is_delicate_cycle' => $request->is_delicate_cycle ?? false,
            'is_hang_dry' => $request->is_hang_dry ?? false,
            'is_return_hanger' => $request->is_return_hanger ?? false,
            'is_additional_request' => $request->is_additional_request ?? false,
            'coverage_type' => $request->coverage_type,
            'invoice_number' => strtoupper(uniqid('INV-')),
            'order_date' => now(),
            'total_amount' => $request->total_amount,
            'status' => 'pending',
        ]);

        // Create Order Items
        foreach ($request->order_items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'bag_name' => $item['bag_name'],
                'quantity' => $item['quantity'],
            ]);
        }

        // Create Payment
        $paymentData = [
            'order_id' => $order->id,
            'payment_method' => $request->payment_method,
            'payment_date' => now(),
            'delivery_charge' => $request->delivery_charge ?? 0,
            'total_amount' => $request->total_amount,
            'status' => 'pending',
        ];

        // If payment method is 'card', add card details to the payment data
        if ($request->payment_method === 'card') {
            $paymentData['card_no'] = $request->card_no;
            $paymentData['card_security_code'] = $request->card_security_code;
            $paymentData['country'] = $request->country;
            $paymentData['zip_code'] = $request->zip_code;
        }

        // Create Payment record
        $payment = Payment::create($paymentData);
        $orderWithDetails = Order::with(['payment', 'orderItems'])->find($order->id);


        // Return response
        return response()->json([
            'message' => 'Order created successfully!',
            'order' => $orderWithDetails,
        ], 201);
    }

    public function myOrder(Request $request)
    {
        $orders = Order::with(['orderItems', 'payment'])
            ->where('customer_id', $request->user()->id)
            ->latest()
            ->paginate(10);

        return response()->json($orders);
    }



}
