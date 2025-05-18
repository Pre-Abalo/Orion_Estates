@extends('layouts.user')
@section('title', 'Se connecter')

@section('content')
    <div class="mt-5 container">
        <h1>@yield('title')</h1>
        @include('partials.flash')
        <form action="{{ route('auth.login') }}" method="post" class="vstack gap-3">
            @csrf
            @include('components.input', ['name' => 'email', 'label' => 'Email'])
            @include('components.input', ['type' => 'password', 'name' => 'password', 'label' => 'Mot de passe'])
            <button class="btn btn-primary w-100 py-2 mt-3">Se connecter</button>
        </form>
    </div>
@endsection
