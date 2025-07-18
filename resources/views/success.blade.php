<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="auth" content="{{ auth()->check() ? auth()->id() : '' }}">
    <meta name="is-admin" content="false">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="app-host" content="{{ config('app.url', '') }}">

    <title>{{ auth()->check() ? env('APP_SECOND_NAME') : config('app.name', 'TRANSPORT POUR TOUS') }}</title>
    <x-icon></x-icon>
    
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset(ispublicpath() .'css/all.home.min.css') }}">
    <link rel="stylesheet" href="{{ asset(ispublicpath() .'css/slick.home.css') }}">
    <link rel="stylesheet" href="{{ asset(ispublicpath() .'css/bootstrap.home.min.css') }}">
    <link rel="stylesheet" href="{{ asset(ispublicpath() .'css/style.home.css') }}">
    <link rel="stylesheet" href="{{ asset(ispublicpath() .'css/media-query.home.css') }}">
</head>
<body>
	<div class="site-content">
		<!-- Preloader start -->
		<div class="loader-mask">
			<div class="loader">
			</div>
		</div>
		<!-- Preloader end -->
		<!-- Header start -->
		<header id="top-header">
			<div class="container">
				<div class="top-header-full">
					<div class="back-btn">
						<a href="javascript:history.go(-1)">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<mask id="mask0_330_7385" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
									<rect width="24" height="24" fill="black"/>
								</mask>
								<g mask="url(#mask0_330_7385)">
									<path d="M15 18L9 12L15 6" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</g>
							</svg>
						</a>
					</div>
					<div class="header-title">
						<p>Confirmation</p>
					</div>
				</div>
			</div>
			<div class="navbar-boder"></div>
		</header>
		<!-- Header end -->
		<!-- Payment successfull screen start -->
		<section id="payment-succuessfull">
			<div class="container">
				<div class="payment-succuessfull-wrap">
					<div class="payment-img"><img src="{{ asset(ispublicpath() .'images/payment/payment-successful.png') }}" alt="payment-img"></div>
					<div class="notification-content mt-32">
						<h1>@lang('locale.congratulations')!</h1>
						<p class="mt-16">{{ $message }}.</p>
					</div>
					<div class="go-courses-btn">
						<a href="{{ route('wallet') }}">@lang('locale.go_back')</a>
					</div>
				</div>
			</div>
		</section>
		<!-- Payment successfull screen end -->
	</div>
	<script src="{{ asset(ispublicpath() .'js/jquery.home.min.js') }}"></script>
    <script src="{{ asset(ispublicpath() .'js/slick.home.min.js') }}"></script>
    <script src="{{ asset(ispublicpath() .'js/bootstrap.bundle.home.min.js') }}"></script>
	<script src="{{ asset(ispublicpath() .'js/custom.home.js') }}"></script>
</body>
</html>