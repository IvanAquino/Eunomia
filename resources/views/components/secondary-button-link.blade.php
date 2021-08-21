<a href="{{ route($route, $routeParams) }}" class="btn bg-secondary btn-sm">
    @if ($icon)
        <i class="{{ $icon }}"></i>
    @endif
    {{ __($label) }}
</a>