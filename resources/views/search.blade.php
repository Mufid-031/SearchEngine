{{-- {{ dd($data) }} --}}

<x-layout>
    <div class="fixed inset-0 z-[-1] overflow-hidden">
        <img id="container-index-page" class="w-full h-full object-cover" src="{{ asset('/background.svg') }}"
            alt="bg">
    </div>
    <x-navbar :query="$query" />
    <main class="px-10 flex gap-5 w-full mt-10">
        <div class="flex flex-wrap justify-center gap-x-6 gap-y-3 w-full mb-5">
            @foreach ($data as $item)
                <div id="card" class="w-[45%] h-40 bg-[#1f2937] rounded-lg flex gap-2">
                    <div class="w-40 h-full">
                        <img id="cover" class="w-full h-full object-cover" src="http://books.toscrape.com/{{ $item['image'] }}" alt="">
                    </div>
                    <div class="w-full flex flex-col gap-3 p-5">
                        <h1 id="title" class="text-lg text-red-500 line-clamp-2">{{ $item['title'] }}</h1>
                        <p id="price" class="text-sm text-yellow-500">{{ $item['price'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</x-layout>

{{-- <div class="w-2/3 h-full flex flex-col gap-5"> --}}
{{-- <x-menu /> --}}
{{-- </div> --}}
