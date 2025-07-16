<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>


    <title>@yield("title")</title>
</head>
<body class="conteiner mx-auto mt-10 mb-10 max-w-lg">
<div>
    @if (session()->has('success'))
        <div>{{ session('success') }}</div>
    @endif
</div>
    @yield('content')
</body>
</html>