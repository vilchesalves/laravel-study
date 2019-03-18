<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Blog! - @yield('title')</title>
</head>
<body>
    <ul>
        <li><a href="{{ route('post.index') }}">Home</a></li>
    </ul>
    @yield('content')
</body>
</html>