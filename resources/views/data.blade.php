@extends('templates.layout')

@section('content')

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                
                                <div class="col-12 col-xl-4">
                                    <div class="justify-content-end d-flex">
                                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                            
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                                <a class="dropdown-item" href="#">January - March</a>
                                                <a class="dropdown-item" href="#">March - June</a>
                                                <a class="dropdown-item" href="#">June - August</a>
                                                <a class="dropdown-item" href="#">August - November</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4" >
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">jumlah pendapatan</p>
                                <p class="fs-30 mb-2"> <div class="count">{{$totalPendapatan}}</div></p>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                        </div>
                        <div class="col-md-6 grid-margin transparent">
                            <div class="row">
                                <div class="col-md-6 mb-4 stretch-card transparent">
                                    <div class="card card-tale">
                                        <div class="card-body">
                                            <h2>pendapatan </h2>
                                            <p class="fs-30 mb-2"> <div class="count">{{$totalPendapatan}}</div></p>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                                    <div class="card card-light-blue">
                                        <div class="card-body">
                                            {{-- <h2>jumlah Transaksi</h2>
                                            <p class="fs-30 mb-2"> <div class="count">{{$jumlahtransaksi}}</div></p> --}}
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-6 stretch-card transparent">
                                    <div class="card card-light-danger">
                                        <div class="card-body">
                                            <p class="mb-4">Number of Clients</p>
                                            <p class="fs-30 mb-2">47033</p>
                                            <p>0.22% (30 days)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}} 
                    {{-- <div class="card-body">
                        <h5 class="card-title">Top 5 penjualan </h5>
                        <div class="activity"> --}}
                            {{-- @foreach ($data['menuSales'] as $menu)
                               <div class="activity-item d-flex">
                                <div class="activity-photo">
                                    <img src="{{ asset('storage/' , $menu->menu->image)}}"
                                         alte="{{ $menu->menu->name}}" class="img-thumbnail" width="50">
                                </div>
                               <div class="activity-content ms-3">
                                    <!-- nama menu diatas -->
                                    <div class="fw-bold">{{ $menu->menu->nama_menu}} </div>
                                    <!-- terjual di bawah -->
                                    <div class="text-muted">Terjual: {{ $menu->total_sales}}</div>
                               </div>
                               </div>
                               @endforeach --}}
                    {{-- <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">jumlah pendapatan</p>
                                    <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                                    <div class="d-flex flex-wrap mb-5">
                                        <div class="mr-5 mt-3">
                                            <p class="text-muted">Order value</p>
                                            <h3 class="text-primary fs-30 font-weight-medium">12.3k</h3>
                                        </div>
                                        <div class="mr-5 mt-3">
                                            <p class="text-muted">Orders</p>
                                            <h3 class="text-primary fs-30 font-weight-medium">14k</h3>
                                        </div>
                                        <div class="mr-5 mt-3">
                                            <p class="text-muted">Users</p>
                                            <h3 class="text-primary fs-30 font-weight-medium">71.56%</h3>
                                        </div>
                                        <div class="mt-3">
                                            <p class="text-muted">Downloads</p>
                                            <h3 class="text-primary fs-30 font-weight-medium">34040</h3>
                                        </div>
                                    </div>
                                    <canvas id="order-chart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="card-title">Sales Report</p>
                                        <a href="#" class="text-info">View all</a>
                                    </div>
                                    <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                                    <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                                    <canvas id="sales-chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    

@endsection