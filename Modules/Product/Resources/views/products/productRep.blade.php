@extends('layouts.app')

@section('title', 'Expired Products')

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Product Reports</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">
                            Product Report
                        </a>
                        
                            <button class="btn btn-success" onclick="window.print()" style="float: right">Print</button>
                        

                        <br><br>

                        <div class="table-responsive">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="dateRange">Filter by Date:</label>
                                    <select id="dateRange" class="form-control">
                                        <option value="all">All</option>
                                        <option value="week">This Week</option>
                                        <option value="month">This Month</option>
                                        <option value="year">This Year</option>
                                    </select>
                                </div>
                                
                            </div>
                            
                            <table id="productTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Product Information</th>
                                        <th>Quantity</th>
                                        <th>Cost</th>
                                        <th>Price</th>
                                        <th>Expiry Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->product_note }}</td>
                                        <td>{{ $product->product_quantity }}</td>
                                        <td>{{ format_currency($product->product_cost) }}</td>
                                        <td>{{ format_currency($product->product_price) }}</td>
                                        <td>{{ $product->expiry_date }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('third_party_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js"
            integrity="sha512-asxKqQghC1oBShyhiBwA+YgotaSYKxGP1rcSYTDrB0U6DxwlJjU59B67U8+5/++uFjcuVM8Hh5cokLjZlhm3Vg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@push('page_scripts')
    <script src="{{ mix('js/chart-config.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#productTable').DataTable();

            // Add search functionality
            $('#dateRange').on('change', function() {
                var range = this.value;

                if (range === 'week') {
                    var startDate = moment().startOf('week').format('YYYY-MM-DD');
                    var endDate = moment().endOf('week').format('YYYY-MM-DD');
                    table.columns(4).search(startDate + ' - ' + endDate).draw();
                } else if (range === 'month') {
                    var startDate = moment().startOf('month').format('YYYY-MM-DD');
                    var endDate = moment().endOf('month').format('YYYY-MM-DD');
                    table.columns(4).search(startDate + ' - ' + endDate).draw();
                } else if (range === 'year') {
                    var startDate = moment().startOf('year').format('YYYY-MM-DD');
                    var endDate = moment().endOf('year').format('YYYY-MM-DD');
                    table.columns(4).search(startDate + ' - ' + endDate).draw();
                } else {
                    table.columns(4).search('').draw();
                }
            });
        });
    </script>
@endpush

