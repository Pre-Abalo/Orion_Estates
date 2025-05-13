@extends('layouts.user')
@section('title', 'Tous nos biens')

@section('content')

    <h1 class="mt-5 text-center fw-bold">@yield('title')</h1>
    <div class="bg-light p-5 mb-5 text-center">
        <form action="" method="get" class="container d-flex gap-2">
            <input type="number" name="surface"  placeholder="Surface Min" value="{{ $input['surface'] ?? '' }}">
            <input type="number" name="rooms"  placeholder="Nombre de pièces Min" value="{{ $input['rooms'] ?? '' }}">
            <input type="number" name="price"  placeholder="Budget Max" value="{{ $input['price'] ?? '' }}">
            <input type="text" name="city"  placeholder="Ville" value="{{ $input['city'] ?? '' }}">
            <input type="text" name="title"  placeholder="Mot clés" value="{{ $input['title'] ?? null }}">
            <button class="btn btn-primary btn-sm flex-grow-0">
                Rechercher
            </button>
        </form>
    </div>

    <div class="container">
        <div class="row mt-5">
            @forelse($properties as $property)
                <div class="col-3 mb-4">
                    @include('partials.card')
                </div>
            @empty
                <div class="col text-center">
                    Aucun bien ne correspond à votre recherche :(
                </div>
            @endforelse
            <div class="container my-4">
                {{ $properties->links() }}
            </div>
        </div>

    </div>

@endsection
