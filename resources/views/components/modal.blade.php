@props(['id', 'maxWidth' => '2xl'])

<div x-data="{ show: false }" x-on:open-modal.window="$event.detail == '{{ $id }}' ? show = true : null">
    <div x-show="show" class="fixed inset-0 flex items-center justify-center z-50">
        <div {{ $attributes->merge(['class' => 'bg-white rounded-lg shadow-xl p-6 max-w-' . $maxWidth]) }}>
            {{ $slot }}
        </div>
    </div>
</div>
