<!DOCTYPE html>
<html>
<head>
	<title>Item Management | @yield('title')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ @csrf_token() }}">
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	
    <link rel="stylesheet" href="{{ url('public/css/bootstrap.min.css') }}">
  	<link rel="stylesheet" href="{{ url('public/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/css/custom.css') }}">

  	@stack('custom-styles')
</head>
<body>
<!-- .wrapper -->
<div class="wrapper">

  @include('common.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')   
  </div>
  <!-- /.content-wrapper -->
  @include('common.footer')
</div>
<script src="{{ url('public/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ url('public/js/jquery.validate.js') }}"></script>
<script src="{{ url('public/js/bootstrap.min.js') }}"></script>
<script src="{{ url('public/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('public/js/toastr.min.js') }}"></script>
<script type="text/javascript">
  var base_url = '{{ url('/') }}';
</script>
<!-- ./wrapper -->
@stack('custom-scripts')
</body>
</html>