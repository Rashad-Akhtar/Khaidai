@extends('admin.admin_layout.masterpage')

@section('content')

<main class="app-content">

    <div class="app-title">
    <div>
        <h1><i class="fa fa-key"></i> Change Password</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Password Settings</a></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Change Password</h3>
            <div class="tile-body">
                <form class="form-horizontal" action="{{ route('admin.changepassword') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="col-md-3 offset-md-1 control-label"><h4>Current Password</h4></label>
                        <div class="col-md-9 offset-md-1">
                            <div class="input-group">
                                <input type="password" name="current_password" class="form-control form-control-lg" placeholder="Current Password">
                                <div class="input-group-append"><span class="input-group-text"><i class="fa fa-lock"></i></span></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 offset-md-1 control-label"><h4>New Password</h4></label>
                        <div class="col-md-9 offset-md-1">
                            <div class="input-group">
                                <input type="password" name="new_password" class="form-control form-control-lg" placeholder="New Password">
                                <div class="input-group-append"><span class="input-group-text"><i class="fa fa-lock"></i></span></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 offset-md-1 control-label"><h4>Re-type Password</h4></label>
                        <div class="col-md-9 offset-md-1">
                            <div class="input-group">
                                <input type="password" name="new_password_confirmation" class="form-control form-control-lg" placeholder="Confirm Password">
                                <div class="input-group-append"><span class="input-group-text"><i class="fa fa-lock"></i></span></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-control-lg offset-md-1 col-md-9">
                        <button type="submit" class="btn btn-block btn-lg btn-primary">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

</main>

@endsection
