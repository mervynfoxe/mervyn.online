@props([
    'name',
    'imageUrl',
    'links' => [],
    'iconLinks' => [],
])
<div
    {{ $attributes->merge([
    'id' => 'profile',
    'class' => 'w-full z-10 lg:w-3/5 rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-white dark:bg-gray-900 mx-6 lg:mx-0 motion-safe:lg:transition-transform delay-300 duration-400 ease-in-out translate-none motion-safe:lg:translate-x-50 motion-safe:in-[.loaded]:lg:translate-none',
    ]) }} >
    <div class="p-4 md:p-12 text-center lg:text-left">
        <!-- Image for mobile view-->
        <div
            class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 h-48 w-48 bg-cover bg-center"
            style="background-image: url('{{ $imageUrl }}')"
        ></div>

        <h1 class="text-3xl font-bold pt-8 lg:pt-0">{{ $name }}</h1>
        <div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-green-500 opacity-25"></div>

        <p class="pt-4 text-base font-bold flex items-center justify-center lg:justify-start">
            <x-bi-briefcase-fill class="h-4 fill-current text-green-700 mr-4" />
            {{ $tagline }}
        </p>
        <p class="pt-2 text-gray-600 dark:text-gray-300 text-xs lg:text-sm flex items-center justify-center lg:justify-start">
            <x-bi-globe class="h-4 fill-current text-green-700 mr-4" />
            {{ $location }}
        </p>
        <p class="pt-8 text-sm">
            {{ $description }}
        </p>

        <div class="pt-12 pb-8 flex flex-col gap-2 lg:gap-5 align-items-start">
            @foreach ($links as $link)
                <div>
                    <x-button
                        href="{{ $link['href'] }}"
                        @class([
                            'block',
                            'lg:inline',
                            'encoded email-link' => strpos($link['href'], 'mailto:') !== FALSE
                        ])>
                        {{ svg($link['icon'], [
                          'class' => 'inline h-5 fill-current text-current align-middle',
                        ]) }}
                        <span class="align-middle">{{ $link['title'] }}</span>
                    </x-button>
                </div>
            @endforeach
        </div>

        @if ($iconLinks)
            <div class="mt-6 pb-16 lg:pb-0 w-4/5 lg:w-full mx-auto flex flex-wrap items-center justify-around lg:justify-start lg:gap-5">
                @foreach ($iconLinks as $link)
                    <a class="link" href="{{ $link['href'] }}" target="_blank" data-tippy-content="{{ $link['tooltip'] }}">
                        {{ svg($link['icon'], [
                          'title' => $link['title'],
                          'class' => 'h-6 fill-current text-gray-600 hover:text-green-700',
                          'width' => '24',
                          'height' => '24',
                        ]) }}
                    </a>
                @endforeach
            </div>
        @endif

        <!-- Use https://simpleicons.org/ to find the svg for your preferred product -->

    </div>

</div>
