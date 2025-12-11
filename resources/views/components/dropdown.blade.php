<div x-data="{ open: false }" class="relative">
    <div x-on:click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open" class="absolute mt-2 w-48 bg-white shadow-lg rounded-md">
        {{ $content }}
    </div>
</div>
