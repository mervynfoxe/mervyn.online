{{-- Mobile Sidebar --}}
<div
    x-show="showSidebar"
    x-trap.inert.noscroll="showSidebar"
    class="fixed inset-0 z-40 flex h-full items-start overflow-y-auto bg-gray-900/50 dark:bg-slate-800/70 pr-10 backdrop-blur-xs lg:hidden"
>
    <div
        class="min-h-full w-full max-w-xs px-4 pb-12 pt-24 sm:px-6"
        x-on:click.outside="showSidebar = false"
    >
        <x-prezet::nav :nav="$nav" />
    </div>
</div>

{{-- Desktop Sidebar --}}
<div class="sidebar hidden lg:relative lg:block lg:flex-none">
    <div class="absolute inset-y-0 right-0 w-[50vw] bg-gray-50 dark:bg-slate-800"></div>
    <div
        class="absolute bottom-0 right-0 top-16 hidden h-12 w-px bg-linear-to-t from-gray-800"
    ></div>
    <div class="absolute bottom-0 right-0 top-28 hidden w-px bg-gray-800"></div>
    <div
        class="sticky top-[4.75rem] -ml-0.5 flex h-[calc(100vh-4.75rem)] w-64 flex-col justify-between overflow-y-auto overflow-x-hidden pb-4 pl-0.5 pr-8 pt-16 xl:w-72 xl:pr-16"
    >
        <x-prezet::nav :nav="$nav" />
        <div class="sidebar-footer mt-16 text-xs text-gray-400 dark:text-gray-200">
            <div class="sidebar-icons mb-2 text-xs text-gray-400 dark:text-gray-200">
                <a href="{{ route('feeds.main') }}">
                    <img class="sidebar-icon" src="{{ Vite::asset('resources/images/icons/rss.svg') }}" alt="RSS feed icon" />
                </a>
            </div>
            <p>&copy;2014-<?= date("Y") ?> Ren Mervyn Fox</p>
            <p><a target="_blank" href="https://prezet.com">Powered by Prezet</a></p>
        </div>
    </div>
</div>
