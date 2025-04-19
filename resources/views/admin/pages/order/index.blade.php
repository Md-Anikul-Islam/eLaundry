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
                <div class="d-flex justify-content-between">
                    <form action="{{ route('order.manage') }}" method="GET" class="d-flex">
                        <div class="me-2">
                            <input type="date" name="start_date" value="{{ request('start_date') }}" class="form-control" placeholder="Start Date">
                        </div>
                        <div class="me-2">
                            <input type="date" name="end_date" value="{{ request('end_date') }}" class="form-control" placeholder="End Date">
                        </div>

                        <!-- Status Filter Dropdown -->
                        <div class="me-2">
                            <select name="status" class="form-control">
                                <option value="">Select Status</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="decline" {{ request('status') == 'decline' ? 'selected' : '' }}>Decline</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                    <!-- Button to download the PDF report -->
                    <button style="background-color:darkblue;" class="btn text-nowrap text-light"
                            onclick="exportTableToPDF('report.pdf', 'Order List')">
                        Download PDF Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Customer Name</th>
                        <th>Invoice No</th>
                        <th>Order Date</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $key=>$orderData)
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
                                @elseif($orderData->status == 'completed')
                                    <span class="badge badge-outline-info">Completed</span>
                                @elseif($orderData->status == 'decline')
                                    <span class="badge badge-danger">Decline</span>
                                @endif

                            </td>
                            <td style="width: 100px;">

                                <a href="{{route('order.manage.show',$orderData->id)}}" class="btn btn-primary btn-sm">Details</a>
                                <a href="{{route('order.destroy',$orderData->id)}}"class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$orderData->id}}">Delete</a>
                            </td>
                        </tr>

                        <div id="danger-header-modal{{$orderData->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel{{$orderData->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header modal-colored-header bg-danger">
                                        <h4 class="modal-title" id="danger-header-modalLabe{{$orderData->id}}l">Delete</h4>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="mt-0">Are You Went to Delete this ? </h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <a href="{{route('order.destroy',$orderData->id)}}" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
    <script>
        function exportTableToPDF(filename, heading) {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            doc.text(heading, doc.internal.pageSize.getWidth() / 2, 20, { align: 'center' });
            let rows = document.querySelectorAll("table tr");
            let data = [];
            for (let i = 0; i < rows.length; i++) {
                let row = [],
                    cols = rows[i].querySelectorAll("td, th");
                for (let j = 0; j < cols.length - 1; j++)
                    row.push(cols[j].innerText);
                data.push(row);
            }
            doc.autoTable({
                head: [data[0]],
                body: data.slice(1),
                startY: 30
            });
            doc.save(filename);
        }
    </script>
@endsection
