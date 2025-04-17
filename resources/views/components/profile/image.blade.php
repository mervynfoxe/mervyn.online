@props([
    'url',
    'alt',
])
<div {{ $attributes->merge([
    'class' => 'w-full lg:w-2/5 z-0 rounded-none lg:rounded-lg lg:rounded-l-none overflow-hidden shadow-2xl hidden lg:block transition-transform motion-reduce:transition-none delay-300 duration-400 ease-in-out -translate-x-50 motion-reduce:translate-none in-[.loaded]:translate-none',
    ]) }} >
    {{-- Big profile image for sidebar on desktop --}}
    <img
        src="{{ $url }}"
        alt="{{ $alt }}"
        class="transition-scale duration-300 ease-in-out hover:scale-110 motion-reduce:hover:scale-none" />
</div>
