<x-layouts.landing
    site-title="Ren Fox"
    page-title="Home"
    seo-description="A description"
    email-enc="pbagnpg@erasbk.bayvar"
>
    <x-slot:content>
        @php
            $links = [
                [
                    'href' => 'https://cdn.renfox.online/assets/doc/RenFox-Resume.pdf',
                    'icon' => 'bi-file-earmark-text',
                    'title' => 'My Resume',
                ],
                [
                    'href' => 'https://www.linkedin.com/in/renfox',
                    'icon' => 'bi-linkedin',
                    'title' => 'Connect with Me',
                ],
                [
                    'href' => 'mailto:#',
                    'icon' => 'ri-mail-line',
                    'title' => 'Get in Touch',
                ],
            ];
        @endphp
        <div class="max-w-4xl flex items-center h-auto lg:h-screen flex-wrap mx-auto my-32 lg:my-0">
            <x-profile.card
                name="Ren Fox"
                :image-url="Vite::asset('resources/images/profile-ren.jpeg')"
                :links="$links"
            >
                <x-slot:tagline>
                    {{-- TODO make this an accessible list --}}
                    Applications | Websites | Databases
                </x-slot:tagline>
                <x-slot:location>
                    Lexington, KY, USA
                </x-slot:location>
                <x-slot:description>
                    {{-- TODO write description --}}
                </x-slot:description>
            </x-profile.card>

            <x-profile.image
                :url="Vite::asset('resources/images/profile-ren.jpeg')"
                alt="Placeholder"
            />

            {{-- <x-theme-toggle /> --}}
        </div>
    </x-slot:content>
</x-layouts.landing>
