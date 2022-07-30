@props([
    'header',
    'footer',
    'script',
])

<div wire:ignore.self {{ $attributes->class(['modal']) }}>
    <div class="modal-content">
        <h4>
            {{ $header }}
        </h4>

        <div>
            {{ $slot }}
        </div>
    </div>

    <div class="modal-footer" style="padding: 0 27px;">
        <a class="modal-action modal-close waves-effect waves-gray btn-flat ">Close</a>
        {{ $footer }}
    </div>
</div>
