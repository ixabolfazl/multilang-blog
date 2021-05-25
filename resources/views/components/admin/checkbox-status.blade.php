<div class="form-group">
    <div class="custom-control custom-switch custom-switch-success">
        <p class="mb-50">{{ $label }}</p>
        <input type="hidden" name="{{ $name }}" value="Disable">
        <input type="checkbox" class="custom-control-input" id="status" name="{{ $name }}" value="Enable" checked/>
        <label class="custom-control-label" for="status">
            <span class="switch-icon-left"><i data-feather="check"></i></span>
            <span class="switch-icon-right"><i data-feather="x"></i></span> </label>
    </div>
</div>
