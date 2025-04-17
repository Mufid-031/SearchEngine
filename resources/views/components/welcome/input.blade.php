{{-- Desktop search input --}}
<div id="container-search" class="hidden lg:flex flex-col justify-end h-full py-8 px-5">
    <div class="w-full flex justify-center items-end mb-10 relative">
        <img id="rocket" class="w-7 absolute left-4 top-2" src="{{ asset('/rocket.png') }}" alt="rocket">
        <input class="w-full h-11 rounded-lg p-2 pl-14 pr-14 bg-[#202020] border border-slate-600 text-white"
            type="text" name="search" id="search" placeholder="Search" autocomplete="off">
        <x-lucide-search class="absolute w-5 h-5 text-[#cacaca] right-4 top-3" id="icon-search" />
    </div>
</div>
{{-- Mobile search input --}}
<div class="flex lg:hidden flex-col justify-end h-full py-8 px-5">
    <div class="w-full flex justify-center items-end mb-10 relative">
        <img id="rocket" class="w-7 absolute left-4 top-2" src="{{ asset('/rocket.png') }}" alt="rocket">
        <input class="w-full h-11 rounded-lg p-2 pl-14 pr-14 bg-[#202020] border border-slate-600 text-white"
            type="text" name="search" id="search" placeholder="Search" autocomplete="off">
        <x-lucide-search class="absolute w-5 h-5 text-[#cacaca] right-4 top-3" id="icon-search" />
    </div>
</div>

<script>
    const searchValue = document.querySelector('#search');
    const searchButton = document.querySelector('#icon-search');

    searchButton.addEventListener('click', () => {
        if (searchValue.value.trim() == '') return
        window.location.href = `/search?query=${searchValue.value}`;
    })
</script>
