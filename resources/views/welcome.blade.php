<x-layout>
    <div id="container-index-page"
        class="grid grid-cols-3 w-full h-screen bg-[url('/public/background.svg')] bg-cover bg-no-repeat relative overflow-hidden">
        <div class="flex flex-col justify-between h-full py-8 px-5">
            <div>
                <h1 class="text-4xl font-bold mb-4 text-white">Welcome to <span class="text-red-600">Larabook </span> <img
                        class="w-10 inline" id="rocket-title" src="{{ asset('/rocket.png') }}" alt="rocket"></h1>
                <p class="text-lg text-gray-400">Find your favorite books and start reading now!</p>
            </div>
            <div class="bg-white bg-opacity-30 w-80 h-1/2"></div>
        </div>
        <div id="container-search" class="flex flex-col justify-end h-full py-8 px-5">
            <div class="w-full flex justify-center items-end mb-10 relative">
                <img class="w-7 absolute left-4 top-2" src="{{ asset('/rocket.png') }}" alt="rocket">
                <input class="w-full h-11 rounded-lg p-2 pl-14 bg-[#202020] border border-slate-600 text-white"
                    type="text" name="search" id="search" placeholder="Search book..." autocomplete="off">
                <x-zondicon-search class="absolute w-5 h-5 text-[#cacaca] right-4 top-3" id="icon-search" />
            </div>
        </div>
        <div class="flex flex-col justify-between items-end h-full py-8 px-5 z-10">
            <div class="bg-white bg-opacity-30 w-80 h-1/2"></div>
            <div class="w-full">
                <div class="flex justify-end items-end">
                    <span class="flex gap-1 items-center text-white text-sm mr-10 cursor-pointer">
                        <x-akar-settings-horizontal class="w-3 h-3 text-white" />
                        Customize
                    </span>
                </div>
            </div>
        </div>
        <div class="absolute right-0 bottom-0 w-52 h-52">
            {{-- <img src="{{ asset('/rocket.png') }}" alt="rocket"> --}}
        </div>
    </div>

    <script>
        const searchValue = document.querySelector('#search');
        const searchButton = document.querySelector('#icon-search');

        searchButton.addEventListener('click', () => {
            fetch(`http://127.0.0.1:8000/search?query=${searchValue.value}`);
            window.location.href = `/search?query=${searchValue.value}`;
        })
    </script>
</x-layout>
