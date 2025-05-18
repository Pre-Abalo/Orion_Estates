@extends('layouts.user')
@section('title', $property->title)

@section('content')

    <div class="container my-5">
        <!-- Titre Principal -->
        <div class="text-center mb-5">
            <h1 class="display-4">{{ $property->title }}</h1>
            <h2 class="text-muted">{{ $property->surface }}m² - {{ $property->city }} ({{ $property->postal_code }})</h2>

            <div class="text-success fw-bold mt-3" style="font-size: 2.8rem;">
                {{ number_format($property->price, thousands_separator: ' ') }} €
            </div>
        </div>

        <hr class="mb-5">

        <!-- Description -->
        <div class="bg-light p-5 rounded mb-5 shadow-sm">
            <h2 class="mb-4">Description du bien</h2>
            <p style="white-space: pre-line">{!! nl2br($property->description) !!}</p>
        </div>

        <!-- Caractéristiques et Spécificités -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header text-white bg-secondary">
                        <h4>Caractéristiques</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td scope="row" style="width: 40%;">Surface</td>
                                <td>{{ $property->surface }}m²</td>
                            </tr>
                            <tr>
                                <td scope="row">Pièces</td>
                                <td>{{ $property->rooms }}</td>
                            </tr>
                            <tr>
                                <td>Chambres</td>
                                <td>{{ $property->bedrooms }}</td>
                            </tr>
                            <tr>
                                <td>Étage</td>
                                <td>{{ $property->floor }}</td>
                            </tr>
                            <tr>
                                <td>Localisation</td>
                                <td>
                                    {{ $property->city }} <br>
                                    {{ $property->address }}<br>
                                    {{ $property->postal_code }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="card">
                    <div class="card-header text-white bg-info">
                        <h4>Spécificités</h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($property->option as $option)
                            <li class="list-group-item">{{ $option->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


        <!-- Formulaire -->
        <div class="card shadow-sm p-4 mt-5">
            <h2 class="mb-3 text-primary">Intéressé par ce bien ?</h2>
            <p class="text-muted">Remplissez les informations ci-dessous pour être contacté par un agent.</p>
            <form class="vstack gap-3" action="" method="post">
                @csrf
                <div class="row">
                    @include('components.input', ['class' => 'col-md-6', 'name' => 'firstname', 'label' => 'Prénom'])
                    @include('components.input', ['class' => 'col-md-6', 'name' => 'lastname', 'label' => 'Nom'])
                </div>
                <div class="row">
                    @include('components.input', ['class' => 'col-md-6', 'name' => 'phone', 'label' => 'Téléphone'])
                    @include('components.input', ['type'=> 'email', 'class' => 'col-md-6', 'name' => 'email', 'label' => 'Email'])
                </div>
                <div class="row">
                    @include('components.input', ['type'=> 'textarea', 'class' => 'col-12', 'name' => 'message', 'label' => 'Votre message'])
                </div>
                <button class="btn btn-primary w-100 py-2 mt-3">Envoyer votre demande</button>
            </form>
        </div>
    </div>

@endsection
