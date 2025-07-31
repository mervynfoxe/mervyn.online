<footer
    class="bottom-0 mt-2 shadow-md bg-gray-300 px-4 py-5 sm:px-6 lg:px-8 dark:bg-zinc-800"
>
    <div class="grid grid-cols-12">
        <div
            class="col-span-12 flex flex-none flex-wrap items-center justify-between xl:col-span-10 xl:col-start-2"
        >
            <div class="relative flex gap-4 justify-between grow basis-0 items-center text-sm text-gray-900 dark:text-gray-100">
                <div>
                    &copy;2014-<?= date("Y") ?> Ren Mervyn Fox
                </div>
                <div class="grow">
                    <nav class="flex gap-4 items-center">
                        <a
                            href="{{ route('prezet.index') }}/about"
                            class="inline-block"
                        >
                            <span class="text-gray-900 dark:text-gray-300">
                                About
                            </span>
                        </a>
                        <a
                            aria-label="Home"
                            href="{{ route('prezet.index') }}/shoutbox"
                            class="inline-block"
                        >
                            <span class="text-gray-900 dark:text-gray-300">
                                Shoutbox
                            </span>
                        </a>
                        <a class="inline-block w-4" href="{{ route('feeds.main') }}">
                            <img class="sidebar-icon" src="{{ Vite::asset('resources/images/icons/rss.svg') }}" alt="RSS feed icon" />
                        </a>
                    </nav>
                </div>
                <div>
                    <a target="_blank" href="https://prezet.com">Powered by Prezet</a>
                </div>
            </div>
        </div>
    </div>
</footer>
