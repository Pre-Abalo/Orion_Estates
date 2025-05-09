@php
    $class ??= null
@endphp

<div @class(["form-check form-switch", $class])>
    <input type="hidden" value="0" name="{{ $name }}">
    <input type="checkbox" @checked(old($name, $value ?? false)) class="form-check-input @error($name) is-valid @enderror" name="{{ $name }}" value="1" id="{{ $name }}" role="switch">
    <label class="form-check-label" for="{{ $name }}">{{ $label }}</label>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
