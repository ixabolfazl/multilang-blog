<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea dir="{{ $dir }}" id="{{ $name }}" name="{{ $name }}" class="form-control {{$type =='editor'?'editor':''}}" placeholder="{{ $placeholder }}" rows="{{ $rows }}" tabindex="{{ $tabindex }}">{{ $value }}</textarea>
</div>
