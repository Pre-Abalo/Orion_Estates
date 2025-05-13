@extends('layouts.user')

@section('content')
    <div class="bg-light p-5 mb-5 text-center">

        <div class="container">
            <h1 class="fw-bold text-success">Agence OrionEstates</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur culpa dolorem esse libero
                placeat provident quasi sit veritatis voluptatum! Aperiam earum est illo maxime molestias neque obcaecati
                quaerat reprehenderit sunt tempore. Amet animi commodi, eaque eum facilis illo illum iste iure magnam.
            </p>
        </div>

        <div class="container mt-5">
            <h2>Nos derniers biens</h2>
            <div class="row">
                @foreach($properties as $property)
                    <div class="col">
                        @include('partials.card')
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
