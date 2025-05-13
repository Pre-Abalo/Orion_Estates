@extends('layouts.user')
@section('title', $property->title)

@section('content')

    <div class="container">
        <h1>{{ $property->title }}</h1>
        <h2>{{ $property->surface }}m² - {{ $property->city }} ({{ $property->postal_code }})</h2>

        <div class="text-primary fw-bold" style="font-size: 4rem;">
            {{ number_format($property->price, thousands_separator: ' ') }} €
        </div>

        <hr>
        <div class="mt-4">
            <h2>Intèressé par ce bien ?</h2>
            <form class="vstack gap-2" action="" method="post">
                @csrf
                <div class="row">
                    @include('components.input', ['class' => 'col', 'name' => 'firstname', 'label' => 'Prénom'])
                    @include('components.input', ['class' => 'col', 'name' => 'lastname', 'label' => 'Nom'])
                </div>
                <div class="row">
                    @include('components.input', ['class' => 'col', 'name' => 'phone', 'label' => 'Téléphone'])
                    @include('components.input', ['type'=> 'email', 'class' => 'col', 'name' => 'email', 'label' => 'Email'])
                </div>
                @include('components.input', ['type'=> 'textarea', 'class' => 'col', 'name' => 'message', 'label' => 'Votre message'])

                <button class="btn btn-primary">Envoyer</button>
            </form>

        </div>

        <div class="mt-4">
            <p>{!! nl2br($property->description) !!}</p>
            <div class="row">
                <div class="col-8">
                    Caractéristiques :
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <td>Surface</td>
                            <td>{{ $property->surface }}m²</td>
                        </tr>
                        <tr>
                            <td>Pièces</td>
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
                            <td>Adresse</td>
                            <td>{{ $property->address }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-4 me-0">
                    <div class="col-4">
                        Spécificités :
                        <ul class="list-group">
                            @foreach ($property->option as $option)
                                <li class="list-group-item">{{ $option->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
