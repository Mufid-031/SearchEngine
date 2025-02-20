{{-- {{ dd($book) }} --}}

<x-layout>
    <x-navbar :query="$query" />
    <main class="px-48 flex gap-5 w-full h-screen">
        <div class="w-2/3 h-full flex flex-col gap-5">
            <x-menu />
            @foreach ($book as $item)
                <div class="w-full h-32 flex flex-col gap-1 p-5">
                    <div class="flex gap-2">
                        <div class="w-10 h-14 rounded-md">
                            <img class="w-full h-full object-cover" src="http://books.toscrape.com/{{ $item['image'] }}" alt="tes">
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <div class="w-full rounded-md">
                                <h1 class="text-lg text-white">{{ substr($item['title'], 0, 50 ) }}</h1>
                            </div>
                            <div class="w-full rounded-md">
                                <a class="text-sm text-[#cacaca]" href="http://books.toscrape.com/{{ $item['url'] }}">{{ substr($item['url'], 0, 50 ) }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-5 w-full mt-5">
                        <div class="rounded-md">
                            <p class="text-sm text-[#cacaca]">Price : {{ $item['price'] }}</p>
                        </div>
                        <div class="rounded-md">
                            <p class="text-sm text-[#cacaca]">Score : {{ $item['score'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="w-1/3 h-full bg-gray-600 mt-12"></div>
    </main>
</x-layout>
