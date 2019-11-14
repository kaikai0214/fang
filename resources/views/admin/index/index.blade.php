

@extends("admin.public.main")
@section('content')
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Dashboard</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Sales chart -->
            <!-- ============================================================== -->
            <div class="card-group">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <i class="mdi mdi-emoticon font-20 text-muted"></i>
                                        <p class="font-16 m-b-5">New Clients</p>
                                    </div>
                                    <div class="ml-auto">
                                        <h1 class="font-light text-right">23</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 75%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <i class="mdi mdi-image font-20  text-muted"></i>
                                        <p class="font-16 m-b-5">New Projects</p>
                                    </div>
                                    <div class="ml-auto">
                                        <h1 class="font-light text-right">169</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 60%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <i class="mdi mdi-currency-eur font-20 text-muted"></i>
                                        <p class="font-16 m-b-5">New Invoices</p>
                                    </div>
                                    <div class="ml-auto">
                                        <h1 class="font-light text-right">157</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="progress">
                                    <div class="progress-bar bg-purple" role="progressbar" style="width: 65%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <i class="mdi mdi-poll font-20 text-muted"></i>
                                        <p class="font-16 m-b-5">New Sales</p>
                                    </div>
                                    <div class="ml-auto">
                                        <h1 class="font-light text-right">236</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 70%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Sales chart -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Email campaign chart -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Campaign</h4>
                            <div id="campaign" style="height: 168px; width: 100%;" class="m-t-10"></div>
                            <!-- row -->
                            <div class="row text-center text-lg-left">
                                <!-- column -->
                                <div class="col-4">
                                    <h4 class="m-b-0 font-medium">60%</h4>
                                    <span class="text-muted">Open</span>
                                </div>
                                <!-- column -->
                                <div class="col-4">
                                    <h4 class="m-b-0 font-medium">26%</h4>
                                    <span class="text-muted">Click</span>
                                </div>
                                <!-- column -->
                                <div class="col-4">
                                    <h4 class="m-b-0 font-medium">18%</h4>
                                    <span class="text-muted">Bounce</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title m-b-5">Referral Earnings</h5>
                            <h3 class="font-light">$769.08</h3>
                            <div class="m-t-20 text-center">
                                <div id="earnings"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 order-lg-2 order-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h4 class="card-title">Sales Ratio</h4>
                                </div>
                                <div class="ml-auto">
                                    <div class="dl m-b-10">
                                        <select class="custom-select border-0 text-muted">
                                            <option value="0" selected="">August 2018</option>
                                            <option value="1">May 2018</option>
                                            <option value="2">March 2018</option>
                                            <option value="3">June 2018</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center no-block">
                                <div>
                                    <span class="text-muted">This Week</span>
                                    <h3 class="mb-0 text-info font-light">$23.5K <span class="text-muted font-12"><i class="mdi mdi-arrow-up text-success"></i>18.6</span></h3>
                                </div>
                                <div class="ml-4">
                                    <span class="text-muted">Last Week</span>
                                    <h3 class="mb-0 text-muted font-light">$945 <span class="text-muted font-12"><i class="mdi mdi-arrow-down text-danger"></i>46.3</span></h3>
                                </div>
                            </div>
                            <div class="sales ct-charts mt-5"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 order-lg-3 order-md-2">
                    <div class="card">
                        <div class="card-body m-b-0">
                            <h4 class="card-title">Thursday <span class="font-14 font-normal text-muted">12th April, 2018</span></h4>
                            <div class="d-flex align-items-center flex-row m-t-30">
                                <h1 class="font-light"><i class="wi wi-day-sleet"></i> <span>35<sup>°</sup></span></h1>
                            </div>
                        </div>
                        <div class="weather-report" style="height:120px; width:100%;"></div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title m-b-0">Users</h4>
                            <h2 class="font-light">35,658 <span class="font-16 text-success font-medium">+23%</span></h2>
                            <div class="m-t-30">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <h4 class="m-b-0">58%</h4>
                                        <span class="font-14 text-muted">New Users</span>
                                    </div>
                                    <div class="col-6">
                                        <h4 class="m-b-0">42%</h4>
                                        <span class="font-14 text-muted">Repeat Users</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent comment and chats -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
            All Rights Reserved by Nice admin. Designed and Developed by
            <a href="https://wrappixel.com">WrapPixel</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
@endsection
