<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width">
	{{ HTML::style('css/style.css') }}
</head>
<body>

<header>
	@if ( Auth::guest() )
		{{ HTML::link('login', 'Login') }}
	@else
		{{ HTML::link('account', 'My Account Dashboard') }}
		{{ HTML::link('logout', 'Logout') }}
	@endif
</header>

<section id="main">
	@yield('main')
</section>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {
		$('#thwipbox').focus();
	});
</script>

</body>
</html>