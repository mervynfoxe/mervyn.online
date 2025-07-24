<header
    class="sticky top-0 z-50 mb-2 shadow-md bg-gray-400 px-4 py-5 sm:px-6 lg:px-8 dark:bg-zinc-800"
>
    <div class="grid grid-cols-12">
        <div
            class="col-span-12 flex flex-none flex-wrap items-center justify-between xl:col-span-10 xl:col-start-2"
        >
            <div class="relative flex gap-4 grow basis-0 items-center">
                <button
                    aria-label="Menu"
                    class="mr-4 rounded-lg p-1.5 hover:bg-gray-100 active:bg-gray-200 lg:hidden"
                    x-on:click="showSidebar = ! showSidebar"
                >
                    <svg
                        class="h-6 w-6 text-gray-600"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <line x1="4" x2="20" y1="12" y2="12"></line>
                        <line x1="4" x2="20" y1="6" y2="6"></line>
                        <line x1="4" x2="20" y1="18" y2="18"></line>
                    </svg>
                </button>

                <a
                    aria-label="Home"
                    href="{{ route('prezet.index') }}"
                    class="block flex items-center space-x-2"
                >
                    <span
                        class="text-2xl font-bold text-gray-900 dark:text-white uppercase"
                    >
                        {{ config('app.name') }}
                    </span>
                </a>

                {{--
                <a
                    href="{{ route('prezet.index') }}/about"
                    class="block flex items-center space-x-2"
                >
                    <span
                        class="text-lg text-gray-900 dark:text-gray-300"
                    >
                        About
                    </span>
                </a>
                <a
                    aria-label="Home"
                    href="{{ route('prezet.index') }}/shoutbox"
                    class="block flex items-center space-x-2"
                >
                    <span
                        class="text-lg text-gray-900 dark:text-gray-300"
                    >
                        Shoutbox
                    </span>
                </a>
                --}}
            </div>
            <div
                class="relative flex basis-0 items-center justify-end gap-3 sm:gap-8 md:grow lg:gap-6"
            >
                <x-prezet.search />
                <a
                    class="group"
                    aria-label="Homepage"
                    title="Homepage"
                    href="{{ route('app.home') }}"
                >
                    <x-bi-house-door class="h-6 w-6 fill-gray-400 dark:fill-gray-200 group-hover:fill-gray-500" />
                </a>
                <a
                    class="group"
                    aria-label="View on GitHub"
                    title="View on GitHub"
                    href="https://github.com/mervynfoxe/mervyn.online"
                    target="_blank"
                >
                    <x-bi-github class="h-6 w-6 fill-gray-400 dark:fill-gray-200 group-hover:fill-gray-500" />
                </a>

                {{-- <button
                    onclick="
                        const isDark = document.documentElement.classList.toggle('dark');
                        // 5) Save the choice
                        localStorage.setItem('theme', isDark ? 'dark' : 'light');
                    "
                    class="group cursor-pointer"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        strokeWidth="{1.5}"
                        stroke="currentColor"
                        class="h-6 w-6 fill-gray-400 text-gray-400 group-hover:fill-gray-500 group-hover:text-gray-500"
                    >
                        <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z"
                        />
                    </svg>
                </button> --}}
            </div>
        </div>
    </div>
</header>
