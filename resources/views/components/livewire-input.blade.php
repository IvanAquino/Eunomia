<div class="form-group row">
    <label for="{{ $identifier }}" class="col-form-label col-sm-4">
      {{ __($label) }}
    </label>
    <div class="col-sm-8">
      <input
          class="form-control @error($model)is-invalid @enderror"
          type="{{ $type }}"
          id="{{ $identifier }}"
          name="{{ $identifier }}"
          wire:model="{{ $model }}"
          placeholder="{{ __($label) }}"
      >
      @error($model)
          <small id="error-{{ $identifier }}" class="text-danger">{{ $message }}</small>
      @enderror
    </div>
</div>