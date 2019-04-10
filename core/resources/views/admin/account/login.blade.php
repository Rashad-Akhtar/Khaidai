@extends('auth.auth_layout.masterpage')

@section('content')
<div class="logo">
    <h1>Admin</h1>
  </div>
  <div class="login-box">
    <form class="login-form" action="{{ route('admin.login') }}" method="POST">
        @csrf
      <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
      <div class="form-group">
        <label class="control-label">USERNAME</label>
        <input class="form-control" type="text" name="name" placeholder="Username">
      </div>
      @if ($errors->has('name'))
        <div class="mb-3">

            <span role="alert" class="text-danger">
                    <strong>{{ $errors->first('name') }}</strong>
            </span>

        </div>
      @endif
      <div class="form-group">
        <label class="control-label">PASSWORD</label>
        <input class="form-control" type="password" name="password" placeholder="Password">
      </div>

      @if ($errors->has('password'))

            <div class="mb-3">

                    <span role="alert" class="text-danger">
                            <strong>{{ $errors->first('password') }}</strong>
                    </span>

            </div>
        @endif
      <div class="form-group btn-container">
        <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
      </div>
    </form>
  </div>
@endsection
