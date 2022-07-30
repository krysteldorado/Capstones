@props([
    'bottom',
])

<div class="responsive-table-bt">
    <table {{ $attributes->class(['table invoice-data-table white border-radius-4 pt-1']) }}>
        {{ $slot }}
    </table>

    {{ $bottom }}
</div>
