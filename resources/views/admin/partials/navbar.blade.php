<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">OrionEstates</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/properties*') ? 'active' : '' }}"
                       href="{{ route('admin.properties.index') }}">Gérer les biens</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/options*') ? 'active' : '' }}"
                       href="{{ route('admin.options.index') }}">Gérer les options</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
