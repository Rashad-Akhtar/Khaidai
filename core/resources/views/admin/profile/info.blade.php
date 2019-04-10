@extends('admin.admin_layout.masterpage')

@section('content')

<main class="app-content">

        <div class="app-title">
        <div>
            <h1><i class="fa fa-key"></i> Profile Settings</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Profile Settings</a></li>
        </ul>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Profile Settings</h3>
                <div class="tile-body">
                    <form class="form-horizontal" role="form" action="{{ route('admin.profile_update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2  control-label"><h4>Name</h4></label>
                                <div class="col-md-9 ">
                                    <div class="input-group">
                                        <input type="text" name="name" value="{{$admin->name}}" class="form-control form-control-lg" readonly>
                                        <div class="input-group-append"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label"><h4>Email</h4></label>
                                <div class="col-md-9 ">
                                    <div class="input-group">
                                        <input type="email" name="email" value="{{$admin->email}}" class="form-control form-control-lg" placeholder="Your Email">
                                        <div class="input-group-append"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label"><h4>Profile Picture</h4></label>
                                <div class="col-md-9 ">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                            @if (!empty ( $admin->image ))
                                                <div class="fileinput-new thumbnail" style="width: 215px; height: 215px;" data-trigger="fileinput">
                                                    <img style="width: 215px" src="{{ asset($admin->image) }}" alt="...">
                                                </div>
                                            @else
                                            <div class="fileinput-new thumbnail" style="width: 215px; height: 215px;" data-trigger="fileinput">
                                                    <img style="width: 215px" src="{{ asset('assets/admin/img/dummy.png') }}" alt="...">
                                            </div>
                                            @endif
                                            <br>
                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                             style="max-width: 215px; max-height: 215px"></div>
                                        <div>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10">
                                <button type="submit" class="btn  btn-block btn-primary btn-lg">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


</main>

@endsection
