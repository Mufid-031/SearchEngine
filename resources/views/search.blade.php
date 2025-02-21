{{-- {{ dd($data) }} --}}

<x-layout>
    <div class="fixed inset-0 z-[-1] overflow-hidden">
        <img id="container-index-page" class="w-full h-full object-cover" src="{{ asset('/background.svg') }}"
            alt="bg">
    </div>
    <x-navbar :query="$query" />
    <main class="px-10 flex gap-5 w-full mt-10">
        <div class="flex flex-wrap justify-center gap-x-6 gap-y-3 w-full">
            @foreach ($data as $item)
                <div id="card" class="w-[45%] h-56 bg-[#1f2937]">
                    <div class="w-20 h-full">
                        {{-- <img src="http://books.toscrape.com{{ $item['image'] }}" alt=""> --}}
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</x-layout>

{{-- <div class="w-2/3 h-full flex flex-col gap-5"> --}}
{{-- <x-menu /> --}}
{{-- </div> --}}
