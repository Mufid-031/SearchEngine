@props(['query' => ''])

<nav id="navbar" class="flex justify-between items-center p-10 w-full h-14 mt-5">
    <div id="title" class="flex items-center gap-5 pr-12">
        <a class="text-2xl font-bold text-red-500" href="/">
            Larabook
        </a>
    </div>
    <div class="w-full flex justify-center mx-10 relative">
        <input class="w-full h-12 rounded-lg p-2 pr-12 bg-[#323232] text-white" type="text" name="search" id="search"
            placeholder="Search" autocomplete="off" value="{{ $query }}">
        <div
            class="absolute right-1 top-1 w-10 h-10 hover:bg-gradient-to-br from-red-600 to-pink-600 rounded-lg flex justify-center items-center cursor-pointer">
            <x-lucide-search class="w-1/2 h-1/2 text-[#cacaca]" id="icon-search" />
        </div>
    </div>
    <div id="option" class="flex items-center gap-5 pl-12">
        <x-lucide-settings-2 class="w-6 h-6 text-white rotate-90 hover:rotate-0 transition-all duration-300 cursor-pointer" />
        <x-lucide-settings class="w-6 h-6 text-white rotate-90 hover:rotate-0 transition-all duration-300 cursor-pointer" />
    </div>
</nav>
