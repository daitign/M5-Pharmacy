@extends('layouts.app')

@section('title', 'Expired Products')

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Expired Products</li>
    </ol>
@endsection










@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6 col-lg-3">
                    <div class="card border-0">
                        <div class="card-body p-0 d-flex align-items-center shadow-sm">
                            <div class="bg-gradient-danger p-4 mfe-3 rounded-left">
                                <i class="bi bi-calendar font-2xl"></i>
                            </div>
                            <div>
                                <div class="text-value text-danger">0</div>
                                <div class="text-muted text-uppercase font-weight-bold small">Expires Today</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card border-0">
                        <div class="card-body p-0 d-flex align-items-center shadow-sm">
                            <div class="bg-gradient-danger p-4 mfe-3 rounded-left">
                                <i class="bi bi-cart font-2xl"></i>
                            </div>
                            <div>
                                <div class="text-value text-dark">0</div>
                                <div class="text-muted text-uppercase font-weight-bold small">Expires in 7 Days</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card border-0">
                        <div class="card-body p-0 d-flex align-items-center shadow-sm">
                            <div class="bg-gradient-warning p-4 mfe-3 rounded-left">
                                <i class="bi bi-recycle font-2xl"></i>
                            </div>
                            <div>
                                <div class="text-value text-warning">
                                   0
                                </div>
                                <div class="text-muted text-uppercase font-weight-bold small">Expires in 3 Months</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card border-0">
                        <div class="card-body p-0 d-flex align-items-center shadow-sm">
                            <div class="bg-gradient-info p-4 mfe-3 rounded-left">
                                <i class="bi bi-check font-2xl"></i>
                            </div>
                            <div>
                                <div class="text-value text-info">0</div>
                                <div class="text-muted text-uppercase font-weight-bold small">Expires in 6 Months</div>
                            </div>
                        </div>
                    </div>
                </div>

                


                <div class="col-12">
                    
                    <div class="card">
                        <div class="card-body">
                            <a href="#" class="btn btn-primary">
                                Expiration Details
                            </a>
    
                            <br><br>
    
                            <div class="table-responsive">
                                
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>PRODUCT NAME</th>
                                            <th class="text-danger" >EXPIRY DATE</th>
                                            <th>PRODUCT QUANTITY</th>
                                            <th>PRODUCT PRICE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($expiredProducts as $product)
                                        <tr>
                                            <td>{{ $product->product_name }}</td>
                                            <td class="text-danger">{{ $product->expiry_date }}</td>
                                            <td>{{ $product->product_quantity }}</td>
                                            <td>{{ format_currency($product->product_price) }}</td>
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

        

        
    </div>
@endsection

@section('third_party_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js"
            integrity="sha512-asxKqQghC1oBShyhiBwA+YgotaSYKxGP1rcSYTDrB0U6DxwlJjU59B67U8+5/++uFjcuVM8Hh5cokLjZlhm3Vg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@push('page_scripts')
    <script src="{{ mix('js/chart-config.js') }}"></script>
@endpush
