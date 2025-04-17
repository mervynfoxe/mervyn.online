@props([
    'as' => 'a',
    'url' => '',
    'target' => '_blank',
])
@if ($as === 'button')
    <button {{ $attributes->merge([
    'class' => 'bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-full',
    ]) }} >
        {{ $slot }}
    </button>
@else
    <a {{ $attributes->merge([
    'href' => $url,
    'target' => $target,
    'class' => 'bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-full',
    ]) }} >
        {{ $slot }}
    </a>
@endif
