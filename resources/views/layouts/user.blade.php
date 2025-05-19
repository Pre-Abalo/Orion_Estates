<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css'])
    <title>@yield('title', 'Accueil') | Orion Estates</title>
</head>
<body>
@include('partials.navbar')
@yield('content')
@include('partials.footer')
@vite(['resources/js/app.js'])
</body>
</html>
