<header>
    <x-container>
        <header class="flex items-center justify-between py-10">
            <div>
                <a aria-label="TailwindBlog" href="/">
                    <div class="flex items-center justify-between">
                        <img class="hidden h-12 invert dark:invert-0 sm:block" src="{{ asset('/img/logo.png') }}" alt="Ozu">
                    </div>
                </a>
            </div>
            <div class="flex items-center space-x-4 leading-5 sm:space-x-6">
                <a class="hidden font-medium text-gray-900 dark:text-gray-100 sm:block" href="{{ route('projects.index') }}">
                    Projects
                </a>
                <a class="hidden font-medium text-gray-900 dark:text-gray-100 sm:block" href="{{ route('about') }}">
                    The team
                </a>
                <a class="hidden font-medium text-gray-900 dark:text-gray-100 sm:block" href="{{ route('contact') }}">
                    Contact
                </a>
            </div>
        </header>
    </x-container>
</header>
