<div class="form-group">
    <div class="d-flex justify-content-between">
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
        {{ $slot }}
    </div>
    <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}" aria-describedby="{{ $name }}" tabindex="{{ $tabindex }}" autofocus value="{{ old($name) }}"/>
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
