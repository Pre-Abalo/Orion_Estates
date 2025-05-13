<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', 'Accueil') | Orion Estates</title>
</head>
<body>
@include('partials.navbar')
@include('partials.flash')
@yield('content')
@include('partials.footer')
</body>
</html>
