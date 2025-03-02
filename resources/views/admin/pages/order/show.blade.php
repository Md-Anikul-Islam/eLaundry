@extends('admin.app')
@section('admin_content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Halsey Street Laundromat</a></li>
                        <li class="breadcrumb-item active">Order Details Section!</li>
                    </ol>
                </div>
                <h4 class="page-title">Order Details Section!</h4>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-end">
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">Order Information</div>
                <div class="card-body">
                    <p><strong>User Name:</strong> {{ $order->user->name }}</p>
                    <p><strong>Email:</strong> {{ $order->user->email }}</p>
                    <p><strong>Phone:</strong> {{ $order->user->phone }}</p>
                    <p><strong>Order Status:</strong> {{ $order->status ?? 'Pending' }}</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">Order Items</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Service ID</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->orderItems as $item)
                            <tr>
                                <td>{{ $item->service->title }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ number_format($item->price, 2) }}</td>
                                <td>{{ $item->quantity*$item->price }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">Payment Information</div>
                <div class="card-body">
                    <p><strong>Payment Method:</strong> {{ $order->payment->payment_method }}</p>
                    <p><strong>Payment Status:</strong> {{ ucfirst($order->payment->payment_status) }}</p>
                    <p><strong>Payment Date:</strong> {{ $order->payment->payment_date }}</p>
                    <p><strong>Amount Paid:</strong> ${{ number_format($order->payment->payment_amount, 2) }}</p>
                </div>
            </div>
            <div class="text-center mb-2">
            <a href="{{ route('order.manage') }}" class="btn btn-primary d-inline-block">Back to Orders</a>
            </div>
        </div>
    </div>
@endsection
