<header
    class="sticky top-0 z-50 flex flex-none flex-wrap items-center justify-between bg-white dark:bg-slate-700 px-4 py-5 shadow-md shadow-gray-900/5 transition duration-500 sm:px-6 lg:px-8"
>
    <div class="relative flex grow basis-0 items-center">
        <button
            aria-label="Menu"
            class="mr-4 rounded-lg p-1.5 hover:bg-gray-100 active:bg-gray-200 dark:hover:bg-slate-800 dark:active:bg-slate-900 lg:hidden"
            x-on:click="showSidebar = ! showSidebar"
        >
            <svg
                class="h-6 w-6 text-gray-600 dark:text-gray-300"
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
            <span class="text-2xl font-bold text-gray-900 dark:text-gray-300">
                {{ strtoupper(config('prezet.name', config('app.name'))) }}
            </span>
        </a>
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
    </div>
</header>
