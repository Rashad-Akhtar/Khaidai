<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>
        Khaidai | @yield('sub_title')
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="" type="image/png">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href=" {{ asset('assets/admin/css/main.css') }} ">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src=" {{ asset('assets/admin/js/jquery-3.2.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/sweetalert.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    {{--  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vali_admin/css/font-awesome.min.css') }}">  --}}
    <style>
        .toggle-handle {
            position: relative;
            margin: 0 auto;
            padding-top: 0;
            padding-bottom: 0;
            height: 100%;
            width: 0;
            border-width: 0 1px;
            background: #fff;
        }
    </style>
  </head>
  <body class="app sidebar-mini rtl">
  @include('admin.admin_layout.header')
  @include('admin.admin_layout.sidebar')
  @yield('content')
    <!-- Essential javascripts for application to work-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('assets/admin/js/sweetalert.js') }}"></script>
    <script src=" {{ asset('assets/admin/js/popper.min.js') }} "></script>
    <script src=" {{ asset('assets/admin/js/bootstrap.min.js') }} "></script>
    <script src=" {{ asset('assets/admin/js/main.js') }} "></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src=" {{ asset('assets/admin/js/pace.min.js') }} "></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src=" {{ asset('assets/admin/js/chart.js') }} "></script>
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        //<![CDATA[
        bkLib.onDomLoaded(function() {
          elementArray = document.getElementsByClassName("nice-edit");
          for (var i = 0; i < elementArray.length; ++i) {
            nicEditors.editors.push(
              new nicEditor({fullPanel : true}).panelInstance(
                elementArray[i]
              )
            );
          }
        });
        //]]>
    </script>
    <!-- Google analytics script-->

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
