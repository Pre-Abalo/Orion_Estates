@php
    $label ??= null;
    $class ??= null;
    $type ??= 'text';
    $name ??= '';
    $value = old($name, $property->$name ?? ($option->$name ?? null));
@endphp

<div @class(['form-group', $class])>
    <label for="{{ $name }}">{{ $label }}</label>

    @if($type !== 'textarea')
        <input
            type="{{ $type }}"
            class="form-control @error($name) is-invalid @enderror"
            id="{{ $name }}"
            name="{{ $name }}"
            value="{{ $value }}"
            aria-describedby="{{ $name }}-feedback"
        >
    @else
        <textarea
            class="form-control @error($name) is-invalid @enderror"
            name="{{ $name }}"
            id="{{ $name }}"
            aria-describedby="{{ $name }}-feedback"
        >{{ $value }}</textarea>
    @endif

    @error($name)
        <div id="{{ $name }}-feedback" class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
