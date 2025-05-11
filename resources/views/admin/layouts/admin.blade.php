<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', 'Accueil') | Administration</title>
</head>
<body>
@include('admin.partials.navbar')
<div class="container mt-5">
    @include('admin.partials.flash')
    @yield('content')
</div>
@include('admin.partials.footer')

<script>
    document.addEventListener("DOMContentLoaded", function () {
        new TomSelect("select", {
            create: true,
            plugins: ['remove_button'],
            maxItems: 5,
            persist: false,
        });
    });
</script>
</body>
</html>
