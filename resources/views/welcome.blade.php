<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="/assets/js/jquery-3.2.1.min.js"></script>
	<script src="/assets/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/fontawesome-all.min.css">
	<title>@yield('title') - Shop Laravel</title>
</head>

<body>
	<div class="container">
		<div class="welcome">
			@if (session()->has('user_id'))
				<a href="/user/auth/sign-out">登出</a>
			@else
				<a href="/user/auth/sign-up">註冊</a>
				<a href="/user/auth/sign-in">登入</a>
			@endif
		</div>
	</div>
</body>

<style>
	.welcome {
    display: flex;
		align-items: center;
    flex-direction: column;
    justify-content: center;
    height: 100%
	}
</style>

</html>