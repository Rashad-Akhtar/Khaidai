<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="" type="image/png">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href=" {{ asset('assets/admin/css/main.css') }} ">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src=" {{ asset('assets/admin/js/jquery-3.2.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/sweetalert.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <title>Login - Admin</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
       @yield('content')
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('assets/admin/js/sweetalert.js') }}"></script>
    <script src=" {{ asset('assets/admin/js/popper.min.js') }} "></script>
    <script src=" {{ asset('assets/admin/js/bootstrap.min.js') }} "></script>
    <script src=" {{ asset('assets/admin/js/main.js') }} "></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src=" {{ asset('assets/admin/js/pace.min.js') }} "></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>

    @if (Session::has('success'))

    <script type="text/javascript">

        $(document).ready(function () {

            swal("{{ Session::get('success') }}","", "success");

        });

    </script>

 @endif

 @if (Session::has('warning'))

    <script type="text/javascript">

        $(document).ready(function () {

            swal("{{ Session::get('warning') }}","", "warning");

        });

    </script>

 @endif

 <script>

         @if (Session::has('error'))

         toastr.error("{{ Session::get('error') }}");

         @endif

         @if (count($errors) > 0)

         @foreach($errors -> all() as $error)

         toastr.error("{{ $error }}");

         @endforeach

         @endif

     </script>
  </body>
</html>
