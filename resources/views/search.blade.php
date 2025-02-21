{{-- {{ dd($data) }} --}}

<x-layout>
    <x-navbar :query="$query" />
    <main class="px-48 flex gap-5 w-full h-screen">
        <div class="w-2/3 h-full flex flex-col gap-5">
            <x-menu />
            @foreach ($data as $item)
                <div class="w-full flex flex-col gap-1 p-5">
                    <div class="flex gap-2">
                        <div class="w-10 h-10">
                            <img class="w-full h-full object-cover" src="https://en.wikipedia.org/static/favicon/wikipedia.ico"
                                alt="tes">
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <div class="w-full rounded-md">
                                <h1 class="text-lg text-white">{{ substr($item['title'][0], 0, 50) }}</h1>
                            </div>
                            <div class="w-full rounded-md">
                                <a class="text-sm text-[#cacaca]"
                                    href="https://en.wikipedia.org/wiki/{{ $item['title'][0] }}">{{ substr($item['title'][0], 0, 50) }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-5 w-full mt-5">
                        <div class="rounded-md">
                            <p class="text-sm text-[#cacaca]">{{ $item['desc'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="w-1/3 h-full mt-12"></div>
    </main>
</x-layout>
