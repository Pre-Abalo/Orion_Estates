@extends('admin.layouts.admin')
@section('title', 'Ajouter une Option')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1>@yield('title')</h1>
    </div>
    @include('admin.partials.optionsForm')
@endsection
