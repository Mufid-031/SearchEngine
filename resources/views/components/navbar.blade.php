@props(['query' => ''])

<nav class="flex justify-between items-center p-10 w-full h-14">
    <div class="flex items-center gap-5 w-2/3 pr-12">
        <a class="text-2xl font-bold text-red-500" href="/">
            Larabook
        </a>
        <div class="w-full flex justify-center items-end relative">
            <input class="w-full h-12 rounded-lg p-2 pr-12 bg-[#323232] text-white" type="text" name="search"
                id="search" placeholder="Search book..." autocomplete="off" value="{{ $query }}">
            <div
                class="absolute right-1 top-1 w-10 h-10 hover:bg-gradient-to-br from-red-600 to-pink-600 rounded-lg flex justify-center items-center cursor-pointer">
                <x-zondicon-search class="w-1/2 h-1/2 text-[#cacaca]" id="icon-search" />
            </div>
        </div>
    </div>
    <div class="flex items-center gap-5">
        <x-untitledui-settings-toggle-line class="w-6 h-6 text-white rotate-90" />
        <x-untitledui-settings-toggle-line class="w-6 h-6 text-white rotate-90" />
    </div>
</nav>
