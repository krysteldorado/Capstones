<a {{ $attributes->class([
        'waves-effect waves-grey btn',
        'gradient-45deg-button-good' => $isGood,
        'fafafa grey lighten-5 black-text' => !$isGood,
    ]) }}>
    {{ $slot }}
</a>
