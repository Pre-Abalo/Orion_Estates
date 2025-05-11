@php
    $label ??= null;
    $class ??= null;
    $type ??= 'text';
    $name ??= ''
@endphp

<div @class(['form-group', $class])>
    @if($type !== 'textarea')
        <label for="{{ $name }}">{{ $label }}</label>
        <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}"
               value="{{ old($name, $property->$name ?? $option->$name) }}">
        @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    @else
        <label for="{{ $name }}">{{ $label }}</label>
        <textarea class="form-control" name="{{ $name }}" id="{{ $name }}">{{ old($name, $property->$name ?? $option->$name) }}</textarea>
        @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
            @enderror
    @endif

</div>
