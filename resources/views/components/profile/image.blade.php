@props([
    'url',
    'alt',
])
<div {{ $attributes->merge([
    'class' => 'w-full lg:w-2/5 z-0 rounded-none lg:rounded-lg lg:rounded-l-none overflow-hidden shadow-2xl hidden lg:block motion-safe:transition-transform delay-300 duration-400 ease-in-out motion-safe:-translate-x-50 motion-safe:in-[.loaded]:translate-none',
    ]) }} >
    {{-- Big profile image for sidebar on desktop --}}
    <img
        src="{{ $url }}"
        alt="{{ $alt }}"
        class="motion-safe:transition-scale duration-300 ease-in-out motion-safe:hover:scale-110" />
</div>
