<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea dir="{{ $dir }}" id="{{ $name }}" name="{{ $name }}" class="form-control {{$type =='editor'?'editor':''}} @error(str_replace("[",".",trim($name,"]"))) is-invalid @enderror" placeholder="{{ $placeholder }}" rows="{{ $rows }}" tabindex="{{ $tabindex }}">{!!   $value == null || $errors->any() ? old(str_replace("[",".",trim($name,"]"))) : $value !!}</textarea>
    @error(str_replace("[",".",trim($name,"]")))
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
