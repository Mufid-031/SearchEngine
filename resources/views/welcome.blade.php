<x-layout class="overflow-hidden relative">
    <div id="container-index-page"
        class="grid grid-cols-1 lg:grid-cols-3 w-full h-screen bg-[url('/public/background.svg')] bg-cover bg-no-repeat relative overflow-hidden">
        <div class="flex flex-col justify-between h-full py-8 px-5">
            <x-welcome.header />
            <x-welcome.mysocial />
            <x-welcome.stars />
        </div>
        <x-welcome.input />
        <div class="flex flex-col justify-between items-end h-full py-8 px-5 z-10">
            <x-welcome.paws />
            <div class="w-full">
                <div class="flex justify-end items-end">
                    <span id="customize" class="flex gap-1 items-center text-white text-sm mr-10 cursor-pointer">
                        <x-lucide-settings-2 class="w-3 h-3 text-white" />
                        Customize
                    </span>
                </div>
            </div>
        </div>
    </div>
</x-layout>
