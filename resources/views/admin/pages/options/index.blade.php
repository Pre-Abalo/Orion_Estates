@extends('admin.layouts.admin')
@section('title', __('Toutes vos option'))
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.options.create') }}" class="btn btn-primary">{{ __('Ajouter une option') }}</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('name') }}</th>
                <th class="text-end">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($options as $option)
                <tr>
                    <td>{{ $option->name ?? __('N/A') }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.options.edit', $option) }}" class="btn btn-sm btn-primary">{{ __('Modifier') }}</a>
                        <form action="{{ route('admin.options.destroy', $option) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('Êtes-vous sûr ?') }}')">{{ __('Supprimer') }}</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">{{ __('Aucune options disponible.') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @if($options instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{ $options->links() }}
    @endif
@endsection
