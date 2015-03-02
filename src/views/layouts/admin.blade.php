<!DOCTYPE html>
<html ng-app="DD">
<head>
	<meta charset="utf-8">
	<title>@yield('title', ucfirst(Request::segment(2)).' | DanDigital Admin')</title>
	@include('DD::includes.meta-tags')
	@include('DD::includes.style-tags')
	@include('DD::includes.head-script-tags')
</head>
<body>

	<header id="mainHeader">
		<h1>DanDigital Admin</h1>
		<a id="logout" href="/admin/logout">Logout</a>
	</header>

	<nav id="mainNav">
		{{ HTML::ddMenuItem('dashboard', 'Dashboard') }}
		{{ HTML::ddMenuItem('users', 'Users') }}
	</nav>

	<main>
		@yield('content')
	</main>

	@include('DD::includes.script-tags')

</body>
</html>