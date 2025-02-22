@extends('admin.app')
@section('admin_content')
    {{-- CKEditor CDN --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Halsey Street Laundromat</a></li>
                        <li class="breadcrumb-item active">Order Section!</li>
                    </ol>
                </div>
                <h4 class="page-title">Order Section!</h4>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-end">
                </div>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>User Name</th>
                        <th>Invoice No</th>
                        <th>Order Date</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order as $key=>$orderData)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                {{$orderData->user->name}}
                            </td>
                            <td>
                                {{$orderData->invoice_number}}
                            </td>
                            <td>
                                {{$orderData->order_date}}
                            </td>
                            <td>
                                {{$orderData->total_amount}}
                            </td>
                            <td>
                                @if($orderData->status == 'pending')
                                    <span class="badge badge-outline-success">Pending</span>
                                @elseif($orderData->status == 'processing')
                                    <span class="badge badge-info">Processing</span>
                                @elseif($orderData->status == 'completed')
                                    <span class="badge badge-success">Completed</span>
                                @elseif($orderData->status == 'decline')
                                    <span class="badge badge-danger">Decline</span>
                                @endif

                            </td>
                            <td style="width: 100px;">
                                Delete
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
