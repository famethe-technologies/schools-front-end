
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SMS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="/css/toastr.min.css">
<!--===============================================================================================-->
@if(session('rtl'))
	<link rel="stylesheet" href="/css/auth-rtl.css">
@endif
<!--===============================================================================================-->
	<link rel="stylesheet" href="{{url('plugins/jquery-ui/jquery-ui.min.css')}}">
	<link rel="apple-touch-icon" sizes="57x57" href="{{url('img/apple-icon-57x57.png')}}">
	<link rel="apple-touch-icon" sizes="60x60" href="{{url('img/apple-icon-60x60.png')}}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{url('img/apple-icon-72x72.png')}}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{url('img/apple-icon-76x76.png')}}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{url('img/apple-icon-114x114.png')}}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{url('img/apple-icon-120x120.png')}}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{url('img/apple-icon-144x144.png')}}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{url('img/apple-icon-152x152.png')}}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{url('img/apple-icon-180x180.png')}}">
	<link rel="icon" type="image/png" sizes="192x192"  href="{{url('img/android-icon-192x192.png')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{url('img/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{url('img/favicon-96x96.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{url('img/favicon-16x16.png')}}">
	<link rel="manifest" href="{{url('img/manifest.json')}}">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="{{url('img/ms-icon-144x144.png')}}">
	<meta name="theme-color" content="#ffffff">
</head>
<body>

	<div class="limiter" >
		<div class="container-login100">
			<div class="wrap-login100">

				</div>
            <div class="card" >
				<div class="login100-form">




					<span class="login100-form-title p-b-30">
{{--						<img src="{{url('img/school2.png')}}" height="150" width="370" >--}}
					</span>

					@include('partials.validation_errors')

					@yield('content')



				</div>
                </div>
			</div>
		</div>


	<!-- jQuery -->
    <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
	<script src="{{url('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
	<script src="{{url('assets/vendor/bootstrap/js/popper.min.js')}}"></script>
	<script src="{{url('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

	@yield('scripts')

</body>
</html>
