<x-layout>
    <div id="container-index-page"
        class="grid grid-cols-3 w-full h-screen bg-[url('/public/background.svg')] bg-cover bg-no-repeat relative overflow-hidden">
        <div class="flex flex-col justify-between h-full py-8 px-5">
            <div>
                <h1 id="title" class="text-4xl font-bold mb-4 text-white">Welcome to <span class="text-red-600">Larawik </span> <img
                        class="w-10 inline" id="rocket-title" src="{{ asset('/rocket.png') }}" alt="rocket"></h1>
                <p id="subtitle" class="text-lg text-gray-400">Find everything you need to know about the world around you</p>
            </div>
            <div class="w-80 h-1/2 relative">
                <x-lucide-star id="star" class="w-5 h-5 text-[#cacaca] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" />
                <x-lucide-star id="star" class="w-5 h-5 text-[#cacaca] absolute top-0 left-0" />
                <x-lucide-star id="star" class="w-7 h-7 text-[#cacaca] absolute top-10 left-64" />
                <x-lucide-star id="star" class="w-5 h-5 text-[#cacaca] absolute top-28 left-48" />
                <x-lucide-star id="star" class="w-5 h-5 text-[#cacaca] absolute top-60 left-60" />
                <x-lucide-star id="star" class="w-10 h-10 text-[#cacaca] absolute top-5 left-40 rotate-45" />
                <x-lucide-star id="star" class="w-10 h-10 text-[#cacaca] absolute top-52 left-20 rotate-45" />
                <x-lucide-star id="star" class="w-10 h-10 text-[#cacaca] absolute top-60 left-72 rotate-45" />
                <x-lucide-star id="star" class="w-10 h-10 text-[#cacaca] absolute top-80 left-28 rotate-45" />
                <x-lucide-star id="star" class="w-10 h-10 text-[#cacaca] absolute top-96 left-60 rotate-45" />
                <x-lucide-star id="star" class="w-10 h-10 text-[#cacaca] absolute top-52 left-40 rotate-45" />
            </div>
        </div>
        <div id="container-search" class="flex flex-col justify-end h-full py-8 px-5">
            <div class="w-full flex justify-center items-end mb-10 relative">
                <img id="rocket" class="w-7 absolute left-4 top-2" src="{{ asset('/rocket.png') }}" alt="rocket">
                <input class="w-full h-11 rounded-lg p-2 pl-14 bg-[#202020] border border-slate-600 text-white"
                    type="text" name="search" id="search" placeholder="Search" autocomplete="off">
                <x-lucide-search class="absolute w-5 h-5 text-[#cacaca] right-4 top-3" id="icon-search" />
            </div>
        </div>
        <div class="flex flex-col justify-between items-end h-full py-8 px-5 z-10">
            <div class="w-80 h-1/2 relative">
                <x-lucide-paw-print id="paw" class="w-5 h-5 text-[#cacaca] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" />
                <x-lucide-paw-print id="paw" class="w-5 h-5 text-[#cacaca] absolute top-0 left-0" />
                <x-lucide-paw-print id="paw" class="w-7 h-7 text-[#cacaca] absolute top-10 left-64" />
                <x-lucide-paw-print id="paw" class="w-5 h-5 text-[#cacaca] absolute top-28 left-48" />
                <x-lucide-paw-print id="paw" class="w-5 h-5 text-[#cacaca] absolute top-60 left-60" />
                <x-lucide-paw-print id="paw" class="w-10 h-10 text-[#cacaca] absolute top-5 left-40 rotate-90" />
                <x-lucide-paw-print id="paw" class="w-10 h-10 text-[#cacaca] absolute top-52 left-20 rotate-12" />
                <x-lucide-paw-print id="paw" class="w-10 h-10 text-[#cacaca] absolute top-60 left-72 rotate-12" />
                <x-lucide-paw-print id="paw" class="w-10 h-10 text-[#cacaca] absolute top-80 left-28 rotate-12" />
                <x-lucide-paw-print id="paw" class="w-10 h-10 text-[#cacaca] absolute top-96 left-60 rotate-12" />
            </div>
            <div class="w-full">
                <div class="flex justify-end items-end">
                    <span class="flex gap-1 items-center text-white text-sm mr-10 cursor-pointer">
                        <x-lucide-settings-2 class="w-3 h-3 text-white" />
                        Customize
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script>
        const searchValue = document.querySelector('#search');
        const searchButton = document.querySelector('#icon-search');

        function getData() {
            fetch(`/search?query=${searchValue.value}`);
            window.location.href = `/search?query=${searchValue.value}`;
        }

        searchButton.addEventListener('click', () => {
            getData();
        })
    </script>
</x-layout>
