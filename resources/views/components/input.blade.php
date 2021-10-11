@props(['id' => '', 'name' => '', 'type' => '', 'placeholder' => '', 'valido' => '', 'invalido' => '', 'label' => '', 'for' => '', 'readonly' => false, 'value' => '', 'wire' => '', 'isRequired' => true])

<div class="form-group">
    <label class="form-label" for="{{ $for }}">{{ $label }}</label>
    <input type="{{ $type }}" id="{{ $id }}" class="form-control" name="{{ $name }}"
        placeholder="{{ $placeholder }}" {{ $isRequired ? 'required' : '' }} value="{{ $value }}"
        {{ $readonly ? 'readonly' : '' }} {{ $wire }} />
    @if (isset($validacion))
        {{ $validacion }}
    @endif
    <div class="valid-feedback">{{ $valido }}</div>
    <div class="invalid-feedback">{{ $invalido }}</div>
</div>
{{ $slot }}
