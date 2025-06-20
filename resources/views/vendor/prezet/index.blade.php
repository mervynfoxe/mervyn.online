@php
    /* @var array $nav */
    /* @var array|null|string $currentTag */
    /* @var array|null|string $currentCategory */
    /* @var \Illuminate\Support\Collection<int,\BenBjurstrom\Prezet\Data\DocumentData> $articles */
@endphp

<x-prezet::template>
    @seo([
        'title' => config('prezet.name', config('app.name')),
        'description' =>
            'Mervyn Fox\'s personal blog',
        'url' => route('prezet.index'),
    ])
    <x-slot name="left">
        <x-prezet::sidebar :nav="$nav" />
    </x-slot>
    <section>
        <div class="divide-y divide-gray-200 dark:divide-slate-600">
            <div class="space-y-2 pb-8 md:space-y-5">
                <h1
                    class="font-display text-4xl font-bold tracking-tight text-gray-900 dark:text-gray-200"
                >
                    The Fox Blog
                </h1>

                <div class="justify-between sm:flex">
                    <p class="text-lg leading-7 text-gray-500 dark:text-gray-300">
                        Ramblings and musings and whatever else comes to mind.
                    </p>
                    <div class="mt-4 block sm:mt-0">
                        @if ($currentTag)
                            <span
                                class="inline-flex items-center gap-x-0.5 rounded-md bg-gray-50 dark:bg-slate-800 px-2.5 py-1.5 text-xs font-medium text-gray-600 dark:text-gray-200 ring-1 ring-inset ring-gray-500/10"
                            >
                                {{ \Illuminate\Support\Str::title($currentTag) }}
                                <a
                                    href="{{ route('prezet.index', array_filter(request()->except('tag'))) }}"
                                    class="group relative -mr-1 h-3.5 w-3.5 rounded-xs hover:bg-gray-500/20"
                                >
                                    <span class="sr-only">Remove</span>
                                    <svg
                                        viewBox="0 0 14 14"
                                        class="h-3.5 w-3.5 stroke-gray-600/50 dark:stroke-gray-200/50 group-hover:stroke-gray-600/75 dark:group-hover:stroke-gray-300/70"
                                    >
                                        <path d="M4 4l6 6m0-6l-6 6" />
                                    </svg>
                                    <span class="absolute -inset-1"></span>
                                </a>
                            </span>
                        @endif

                        @if ($currentCategory)
                            <span
                                class="inline-flex items-center gap-x-0.5 rounded-md bg-gray-50 dark:bg-slate-800 px-2.5 py-1.5 text-xs font-medium text-gray-600 dark:text-gray-200 ring-1 ring-inset ring-gray-500/10"
                            >
                                {{ $currentCategory }}
                                <a
                                    href="{{ route('prezet.index', array_filter(request()->except('category'))) }}"
                                    class="group relative -mr-1 h-3.5 w-3.5 rounded-xs hover:bg-gray-500/20"
                                >
                                    <span class="sr-only">Remove</span>
                                    <svg
                                        viewBox="0 0 14 14"
                                        class="h-3.5 w-3.5 stroke-gray-600/50 dark:stroke-gray-200/50 group-hover:stroke-gray-600/75 dark:group-hover:stroke-gray-300/70"
                                    >
                                        <path d="M4 4l6 6m0-6l-6 6" />
                                    </svg>
                                    <span class="absolute -inset-1"></span>
                                </a>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <ul class="divide-y divide-gray-200 dark:divide-slate-600">
                @foreach ($articles as $article)
                    <li class="py-12">
                        <x-prezet::article :article="$article" />
                    </li>
                @endforeach
            </ul>
            <div class="pt-12">
                {{ $paginator->links() }}
            </div>
        </div>
    </section>
</x-prezet::template>
