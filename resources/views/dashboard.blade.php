<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'apiToken' => $currentUser->api_token ?? null,
        ]) !!};
    </script>
    <title>Blog Dashboard</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<div id="dashboard"></div>
<script src="/js/app.js"></script>
</body>
</html>