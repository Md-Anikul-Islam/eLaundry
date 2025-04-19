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
                <h4 class="page-title">Income Section!</h4>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <form action="{{ route('order.income.report') }}" method="GET" class="d-flex">
                        <div class="me-2">
                            <input type="date" name="start_date" value="{{ request('start_date') }}" class="form-control" placeholder="Start Date">
                        </div>
                        <div class="me-2">
                            <input type="date" name="end_date" value="{{ request('end_date') }}" class="form-control" placeholder="End Date">
                        </div>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                    <!-- Button to download the PDF report -->
                    <button style="background-color:darkblue;" class="btn text-nowrap text-light"
                            onclick="exportTableToPDF('income-report.pdf', 'Income Report')">
                        Download Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table  class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Invoice No</th>
                        <th>Order Date</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $key=>$orderData)
                        <tr>
                            <td>{{$key+1}}</td>
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
                                @if($orderData->status == 'completed')
                                    <span class="badge badge-outline-info">Completed</span>
                                @endif
                            </td>
                        </tr>
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
