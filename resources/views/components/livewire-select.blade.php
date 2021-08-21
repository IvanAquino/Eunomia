<div class="form-group row">
    <label for="{{ $identifier }}" class="col-form-label col-sm-4">
        {{ __($label) }}
    </label>
    <div class="col-sm-8">
        <select
            class="form-control @error($model)is-invalid @enderror"
            name="{{ $identifier }}"
            id="{{ $identifier }}"
            wire:model="{{ $model }}"
        >
        {!! $slot !!}
        </select>
        @error($model)
            <small id="error-{{ $identifier }}" class="text-danger">
                {{ $message }}
            </small>
        @enderror
        @if ($help)
            <small id="help-{{ $identifier }}" class="form-text text-muted">
                {!! $help !!}
            </small>
        @endif
    </div>
</div>