<div class="form-group">
    @if($label!=null)
        <div class="d-flex justify-content-between">
            <label for="{{ $name }}" class="form-label">{{ $label }}</label>
            {{ $slot }}
        </div>
    @endif
    @if($type=='file')
        <div class="custom-file">
            <input type="file" class="custom-file-input @error(str_replace("[",".",trim($name,"]"))) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}" tabindex="{{ $tabindex }}" {{ !$disabled ?:'disabled' }}>
            <label class="custom-file-label" for="{{ $name }}">{{ $placeholder }}</label>
            @error($name)
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    @else
        <input dir="{{ $dir }}" type="{{ $type }}" class="form-control @error(str_replace("[",".",trim($name,"]"))) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}" aria-describedby="{{ $name }}" tabindex="{{ $tabindex }}" autofocus value="{{ $value == null || $errors->any() ? old(str_replace("[",".",trim($name,"]"))) : $value }}" {{ !$disabled ?:'disabled' }}/>
    @endif
    @error(str_replace("[",".",trim($name,"]")))
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
