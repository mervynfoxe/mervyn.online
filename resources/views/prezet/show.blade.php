@php
    /* @var string $body */
    /* @var array $nav */
    /* @var array $headings */
    /* @var string $linkedData */
    /* @var \Prezet\Prezet\Data\DocumentData $document */
@endphp

<x-prezet.template>
    @seo([
        'title' => $document->frontmatter->title,
        'description' => $document->frontmatter->excerpt,
        'url' => route('prezet.show', ['slug' => $document->slug]),
        'image' => $image,
    ])

    @push('jsonld')
        <script type="application/ld+json">
            {!! $linkedData !!}
        </script>
    @endpush

    <x-prezet.alpine>
        <div class="grid grid-cols-12 gap-8">
            <div
                class="col-span-10 col-start-2 lg:col-span-10 lg:col-start-2 2xl:col-span-8 2xl:col-start-3"
            >
                <li class="flex items-center dark:text-white">
                    @if($document->category)
                        <a
                            href="{{ route('prezet.category', ['slug' => $document->category]) }}"
                        >
                            {{ $document->category }}
                        </a>
                    @endif
                </li>

                <h1
                    class="mb-6 text-3xl !leading-snug font-bold sm:text-4xl md:mb-8 lg:text-5xl lg:!leading-tight dark:text-white"
                >
                    {{ $document->frontmatter->title }}
                </h1>
                @if ($document->frontmatter->type !== 'page')
                    <ul class="flex flex-wrap items-center gap-3 font-medium">
                        <li class="w-full sm:w-auto dark:text-white">
                            @if($author['bio'])
                                <a
                                    href="#author"
                                    class="group flex items-center gap-x-2"
                                >
                            @endif
                            @if($author['image'])
                                <img
                                    src="{{ $author['image'] }}"
                                    alt="{{ $author['name'] }} profile image"
                                    width="26"
                                    height="26"
                                    loading="lazy"
                                    decoding="async"
                                    class="h-[26px] w-[26px] rounded bg-zinc-100 object-cover transition-all duration-300 group-hover:opacity-75 dark:bg-zinc-800"
                                />
                            @endif
                            <span
                                class="group-hover:text-primary transition-all duration-300"
                            >
                                {{ $author['name'] }}
                            </span>
                            @if($author['bio'])
                                </a>
                            @endif
                        </li>

                        <li
                            class="hidden text-zinc-600 sm:inline-block dark:text-zinc-400"
                        >
                            —
                        </li>
                        <li
                            class="flex items-center gap-1 text-zinc-600 dark:text-zinc-400"
                        >
                            <x-prezet.icon-calendar class="size-5" />
                            <span>{{ $document->createdAt->format('F j, Y') }}</span>
                        </li>
                    </ul>
                @endif
            </div>
            {{-- Hero Image --}}
            {{-- TMP: disable this --}}
            @if ($image && false)
                <div class="hidden md:block -mx-8 sm:mx-0 col-span-8 col-start-3 lg:col-span-10 lg:col-start-2 2xl:col-start-3 lg:my-4 lg:max-w-3/4 xl:max-w-1/2">
                    <img
                    src="{{ $image }}"
                    alt=""
                    loading="lazy"
                    decoding="async"
                    class="max-h-[500px] sm:rounded-2xl bg-zinc-50 dark:bg-zinc-800"
                    />
                </div>
            @endif

            <div
                class="col-span-10 col-start-2 lg:col-span-10 lg:col-start-2 2xl:col-span-8 2xl:col-start-3"
            >
                <div
                    class="h-px w-full border-0 bg-zinc-200 dark:bg-zinc-700"
                ></div>
            </div>

            {{-- Right Sidebar --}}
            @if ($headings)
                <div class="col-span-10 col-start-2 lg:order-last lg:col-span-3 lg:col-start-auto">
                    <div
                        class="flex-none overflow-y-auto lg:sticky lg:top-[6rem] lg:h-[calc(100vh-4.75rem)]"
                    >
                        <nav aria-labelledby="on-this-page-title">
                            <p
                                id="on-this-page-title"
                                class="font-display text-sm font-medium text-zinc-900 dark:text-zinc-100"
                            >
                                On this page
                            </p>
                            <ol role="list" class="mt-4 space-y-3 text-sm">
                                @foreach ($headings as $h2)
                                    <li>
                                        <a
                                            href="#{{ $h2['id'] }}"
                                            :class="{'!text-primary-500 !dark:text-primary-400 !hover:text-primary-500': activeHeading === '{{ $h2['id'] }}'}"
                                            x-on:click.prevent="scrollToHeading('{{ $h2['id'] }}')"
                                            class="text-zinc-700 transition-colors dark:text-zinc-300"
                                        >
                                            {{ $h2['title'] }}
                                        </a>

                                        @if ($h2['children'])
                                            <ol
                                                role="list"
                                                class="mt-2 space-y-3 border-l pl-5"
                                            >
                                                @foreach ($h2['children'] as $h3)
                                                    <li>
                                                        <a
                                                            href="#{{ $h3['id'] }}"
                                                            :class="{'!text-primary-500 !dark:text-primary-400 !hover:text-primary-500': activeHeading === '{{ $h3['id'] }}'}"
                                                            x-on:click.prevent="scrollToHeading('{{ $h3['id'] }}')"
                                                            class="text-zinc-700 transition-colors dark:text-zinc-300"
                                                        >
                                                            {{ $h3['title'] }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ol>
                                        @endif
                                    </li>
                                @endforeach
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="col-span-10 col-start-2 lg:hidden">
                    <div
                        class="h-px w-full border-0 bg-zinc-200 dark:bg-zinc-700"
                    ></div>
                </div>
            @endif

            {{-- Main Content --}}
            <div
                @class([
                    'col-span-10 col-start-2 lg:col-start-2 2xl:col-start-3',
                    'lg:col-span-8 2xl:col-span-6' => !empty($headings),
                    'lg:col-span-10 2xl:col-span-8' => empty($headings),
                ])
            >
                {{-- prose-pre:-mx-8 prose-pre:rounded-none --}}
                <article
                    class="prose-pre:rounded-xl prose-headings:font-display prose prose-zinc prose-a:border-b prose-a:border-dashed prose-a:border-black/30 prose-a:font-semibold prose-a:no-underline prose-a:hover:border-solid prose-img:rounded-sm  prose-img:lg:m-auto prose-img:lg:max-w-3/4 prose-img:xl:max-w-1/2 dark:prose-invert max-w-none"
                >
                    {!! $body !!}
                </article>

                <div
                    class="border-dark/5 my-10 flex flex-col justify-start gap-y-5 border-t pt-10"
                >
                    @if ($document->frontmatter->tags)
                        <ul class="flex flex-wrap items-center gap-2 sm:gap-3">
                            <li>
                                @foreach ($document->frontmatter->tags as $tag)
                                    <a
                                        href="{{ route('prezet.index', ['tag' => strtolower($tag)]) }}"
                                        class="inline-flex items-center rounded-md bg-zinc-50 px-3 py-1.5 text-xs text-zinc-800 ring-1 ring-zinc-500/10 transition ring-inset hover:bg-zinc-200 dark:bg-zinc-700 dark:text-zinc-200 dark:ring-zinc-700 dark:hover:bg-zinc-600"
                                    >
                                        <x-prezet.icon-tag
                                            class="mr-1 h-3 w-3"
                                        />

                                        {{ $tag }}
                                    </a>
                                @endforeach
                            </li>
                        </ul>
                    @endif
                </div>
                @if($author['bio'])
                    <div
                        id="author"
                        class="flex flex-col items-start gap-x-6 gap-y-4 rounded-xl bg-zinc-50 p-6 ring-1 ring-zinc-500/10 ring-inset md:flex-row md:p-7 dark:bg-zinc-800 dark:text-zinc-300"
                    >
                        @if($author['image'])
                            <img
                                src="{{ $author['image'] }}"
                                alt="profile image of {{ $author['name'] }}"
                                width="135"
                                height="135"
                                loading="lazy"
                                decoding="async"
                                class="h-24 w-24 rounded-xl bg-zinc-100 object-cover md:h-[135px] md:w-[135px] dark:bg-zinc-800"
                            />
                        @endif
                        <div>
                            <p
                                class="text-[20px] font-medium text-black md:text-2xl dark:text-white"
                            >
                                {{ $author['name'] }}
                            </p>
                            <div
                                class="mt-2 text-zinc-600 md:mt-3 dark:text-zinc-400"
                            >
                                <p class="dark">
                                    {{ $author['bio'] }}
                                </p>
                            </div>
                            <a
                                class="hover:text-primary dark:hover:text-primary-dark mt-3 flex w-fit items-center gap-x-1 text-sm font-medium underline md:text-base dark:text-zinc-200"
                                href="{{ route('prezet.index', ['author' => strtolower($document->frontmatter->author)]) }}"
                            >
                                More posts from {{ $author['name'] }}
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="size-4"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25"
                                    />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endif
                @if($document->frontmatter->comments === true)
                    <x-comment-widget
                        :header="!empty($document->frontmatter->comments_header) ? $document->frontmatter->comments_header : false"
                        :slug="$document->frontmatter->slug"
                        :title="$document->frontmatter->title"
                    />
                @endif
            </div>
        </div>
    </x-prezet.alpine>
</x-prezet.template>
