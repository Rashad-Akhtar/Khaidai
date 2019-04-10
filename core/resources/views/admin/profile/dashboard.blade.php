@extends('admin.admin_layout.masterpage')

@section('sub_title')
    Dashboard
@endsection

@section('content')
<main class="app-content">

    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> DashBoard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
    </div>

    <div class="tile ">
        <h3 class="tile-title"><i class="fa fa-users"></i> Site Statistics</h3>
        <div class="tile-body">
            <div class="row">

                <div class="col-lg-4 ">
                        <div class="bs-component">
                            <div class="card mb-3 text-white  bg-info  text-center">
                                <div class="card-body">
                                    <blockquote class="card-blockquote">
                                        <h3>Total Categories</h3>
                                        <h5>{{ $total_categories }} </h5>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="col-lg-4">
                    {{-- <a href="#" class="text-decoration"> --}}
                        <div class="bs-component">
                            <div class="card mb-3 text-white  bg-success  text-center">
                                <div class="card-body">
                                    <blockquote class="card-blockquote">
                                        <h3>Total Products</h3>
                                        <h5>{{ $total_products }} </h5>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    {{-- </a> --}}
                </div>
                <div class="col-lg-4">
                    {{-- <a href="#" class="text-decoration"> --}}
                        <div class="bs-component">
                            <div class="card mb-3 text-white  bg-dark  text-center">
                                <div class="card-body">
                                    <blockquote class="card-blockquote">
                                        <h3>Total Sales</h3>
                                        <h5> {{ $total_sale }} </h5>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    {{-- </a> --}}
                </div>
            </div>
        </div>
    </div>

</main>
      <script type="text/javascript">

        $("#dashboard").addClass("active");

    </script>

@endsection
