<a href="{{ route($route, $routeParams) }}" class="btn bg-purple">
    @if ($icon)
        <i class="{{ $icon }}"></i>
    @endif
    {{ __($label) }}
</a>