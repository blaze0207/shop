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
  <header>
    <a href="#">登入</a>
    <a href="#">註冊</a>
  </header>

  <div class="container">
    @yield('content')
  </div>

  <footer>
    <a href="#">聯絡我們</a>
  </footer>
</body>
</html>