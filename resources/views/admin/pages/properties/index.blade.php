@extends('admin.layouts.admin')
@section('title', __('Tous vos biens'))
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.properties.create') }}" class="btn btn-primary">{{ __('Ajouter un bien') }}</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('Titre') }}</th>
                <th>{{ __('Surface') }}</th>
                <th>{{ __('Prix') }}</th>
                <th>{{ __('Ville') }}</th>
                <th class="text-end">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($properties as $property)
                <tr>
                    <td>{{ $property->title ?? __('N/A') }}</td>
                    <td>{{ $property->surface ?? __('N/A') }}</td>
                    <td>{{ $property->price ?? __('N/A') }}</td>
                    <td>{{ $property->city ?? __('N/A') }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.properties.edit', $property) }}" class="btn btn-sm btn-primary">{{ __('Modifier') }}</a>
                        <form action="{{ route('admin.properties.destroy', $property) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('Êtes-vous sûr ?') }}')">{{ __('Supprimer') }}</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">{{ __('Aucune propriété disponible.') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @if($properties instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{ $properties->links() }}
    @endif
@endsection
