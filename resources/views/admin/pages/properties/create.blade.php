@extends('admin.layouts.admin')
@section('title', 'Ajouter un bien')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1>@yield('title')</h1>
    </div>
    @include('admin.partials.propertiesForm')
@endsection
