

<x-layout>

    <div class="relative flex items-center overflow-hidden p-12">
        <img class="absolute inset-0 w-full h-full object-cover" src="{{ $page->cover?->thumbnail(1024) }}" role="presentation" alt="Ozu Demo project">
        <div class="absolute inset-0 from-black/30 to-black/0  bg-gradient-to-r"></div>
        <div class="absolute inset-0 from-black/40 to-black/0  bg-gradient-to-r"></div>
        <div class="relative text-4xl sm:text-6xl xl:text-8xl uppercase font-bold text-white py-12">
            {!! $page->content !!}
        </div>
    </div>

    <x-section class="mt-24 mb-24 px-12">
        <div class="grid sm:grid-cols-2 gap-4">
            <x-kpi>
                <x-slot:icon>
                    <x-icon-monkey-1 class="w-6 h-6"></x-icon-monkey-1>
                </x-slot:icon>
                Jocko is the best monkey
            </x-kpi>
            <x-kpi>
                <x-slot:icon>
                    <x-icon-monkey-2 class="w-6 h-6"></x-icon-monkey-2>
                </x-slot:icon>
                Jocko can run fast
            </x-kpi>
            <x-kpi>
                <x-slot:icon>
                    <x-icon-monkey-3 class="w-6 h-6"></x-icon-monkey-3>
                </x-slot:icon>
                Jocko can jump high
            </x-kpi>
            <x-kpi>
                <x-slot:icon>
                    <x-icon-monkey-4 class="w-6 h-6"></x-icon-monkey-4>
                </x-slot:icon>
                Jocko can swim
            </x-kpi>
            <x-kpi>
                <x-slot:icon>
                    <x-icon-monkey-5 class="w-6 h-6"></x-icon-monkey-5>
                </x-slot:icon>
                Jocko can fly
            </x-kpi>
            <x-kpi>
                <x-slot:icon>
                    <x-icon-monkey-7 class="w-6 h-6"></x-icon-monkey-7>
                </x-slot:icon>
                Jocko can code
            </x-kpi>
        </div>
    </x-section>
    <x-section>
        <x-slot:title>
            Featuring projects
        </x-slot:title>
        <div class="grid md:grid-cols-2 gap-8">
            @foreach($projects as $project)
                <x-project-item :project="$project" />
            @endforeach
        </div>
        <div class="text-center mt-8">
            <x-link href="{{ route('projects.index') }}">
                Browse projects...
            </x-link>
        </div>
    </x-section>
</x-layout>
