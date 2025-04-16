<x-layout class="overflow-hidden relative">
    <div id="container-index-page"
        class="grid grid-cols-1 lg:grid-cols-3 w-full h-screen bg-[url('/public/background.svg')] bg-cover bg-no-repeat relative overflow-hidden">
        <div class="flex flex-col justify-between h-full py-8 px-5">
            <div>
                <h1 id="title" class="text-4xl font-bold mb-4 text-white">Welcome to <span
                        class="font-bold bg-gradient-to-r from-blue-600 via-red-500 to-yellow-400 bg-clip-text text-transparent">NextBrave
                    </span> <img class="w-10 inline" id="rocket-title" src="{{ asset('/rocket.png') }}" alt="rocket">
                </h1>
                <p id="subtitle" class="text-lg text-gray-400">Find everything you need to know about the world around
                    you</p>
            </div>
            <div class="flex gap-4 items-center mt-10 flex-wrap social">
                <div class="flex flex-col gap-2 items-center">
                    <div class="bg-white/20 w-16 h-16 rounded-lg flex justify-center items-center">
                        <a href="https://github.com/Mufid-031" class="pt-3 px-2 rounded-full bg-white/60">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                                fill="black" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-github-icon lucide-github">
                                <path
                                    d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4" />
                                <path d="M9 18c-4.51 2-5-2-7-2" />
                            </svg>
                        </a>
                    </div>
                    <p class="text-white text-sm">Github</p>
                </div>
                <div class="flex flex-col gap-2 items-center social">
                    <div class="bg-white/20 w-16 h-16 rounded-lg flex justify-center items-center">
                        <a href="https://coding-with-mufid.vercel.app">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24"
                                fill="none" stroke="lightblue" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-globe-icon lucide-globe">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20" />
                                <path d="M2 12h20" />
                            </svg>
                        </a>
                    </div>
                    <p class="text-white text-sm">My Website</p>
                </div>
                <div class="flex flex-col gap-2 items-center social">
                    <div class="bg-white/20 w-16 h-16 rounded-lg flex justify-center items-center">
                        <a href="https://www.linkedin.com/in/coding-with-mufid">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24"
                                fill="none" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-linkedin-icon lucide-linkedin">
                                <path
                                    d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                                <rect width="4" height="12" x="2" y="9" />
                                <circle cx="4" cy="4" r="2" />
                            </svg>
                        </a>
                    </div>
                    <p class="text-white text-sm">Linkedin</p>
                </div>
                <div class="flex flex-col gap-2 items-center social">
                    <div class="bg-white/20 w-16 h-16 rounded-lg flex justify-center items-center">
                        <a href="mailto:risqimufid50@gmai.com">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24"
                                fill="none" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-mail-icon lucide-mail">
                                <rect width="20" height="16" x="2" y="4" rx="2" />
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                            </svg>
                        </a>
                    </div>
                    <p class="text-white text-sm">Email</p>
                </div>
            </div>
            <div class="w-80 h-1/2 relative">
                <x-lucide-star id="star"
                    class="w-5 h-5 text-[#cacaca] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" />
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
        {{-- Desktop search input --}}
        <div id="container-search" class="hidden lg:flex flex-col justify-end h-full py-8 px-5">
            <div class="w-full flex justify-center items-end mb-10 relative">
                <img id="rocket" class="w-7 absolute left-4 top-2" src="{{ asset('/rocket.png') }}"
                    alt="rocket">
                <input class="w-full h-11 rounded-lg p-2 pl-14 pr-14 bg-[#202020] border border-slate-600 text-white"
                    type="text" name="search" id="search" placeholder="Search" autocomplete="off">
                <x-lucide-search class="absolute w-5 h-5 text-[#cacaca] right-4 top-3" id="icon-search" />
            </div>
        </div>
        {{-- Mobile search input --}}
        <div class="flex lg:hidden flex-col justify-end h-full py-8 px-5">
          <div class="w-full flex justify-center items-end mb-10 relative">
              <img id="rocket" class="w-7 absolute left-4 top-2" src="{{ asset('/rocket.png') }}"
                  alt="rocket">
              <input class="w-full h-11 rounded-lg p-2 pl-14 pr-14 bg-[#202020] border border-slate-600 text-white"
                  type="text" name="search" id="search" placeholder="Search" autocomplete="off">
              <x-lucide-search class="absolute w-5 h-5 text-[#cacaca] right-4 top-3" id="icon-search" />
          </div>
      </div>
        <div class="flex flex-col justify-between items-end h-full py-8 px-5 z-10">
            <div class="w-80 h-1/2 relative">
                <x-lucide-paw-print id="paw"
                    class="w-5 h-5 text-[#cacaca] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" />
                <x-lucide-paw-print id="paw" class="w-5 h-5 text-[#cacaca] absolute top-0 left-0" />
                <x-lucide-paw-print id="paw" class="w-7 h-7 text-[#cacaca] absolute top-10 left-64" />
                <x-lucide-paw-print id="paw" class="w-5 h-5 text-[#cacaca] absolute top-28 left-48" />
                <x-lucide-paw-print id="paw" class="w-5 h-5 text-[#cacaca] absolute top-60 left-60" />
                <x-lucide-paw-print id="paw"
                    class="w-10 h-10 text-[#cacaca] absolute top-5 left-40 rotate-90" />
                <x-lucide-paw-print id="paw"
                    class="w-10 h-10 text-[#cacaca] absolute top-52 left-20 rotate-12" />
                <x-lucide-paw-print id="paw"
                    class="w-10 h-10 text-[#cacaca] absolute top-60 left-72 rotate-12" />
                <x-lucide-paw-print id="paw"
                    class="w-10 h-10 text-[#cacaca] absolute top-80 left-28 rotate-12" />
                <x-lucide-paw-print id="paw"
                    class="w-10 h-10 text-[#cacaca] absolute top-96 left-60 rotate-12" />
            </div>
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

    <script>
        const searchValue = document.querySelector('#search');
        const searchButton = document.querySelector('#icon-search');

        searchButton.addEventListener('click', () => {
            if (searchValue.value.trim() == '') return
            window.location.href = `/search?query=${searchValue.value}`;
        })
    </script>
</x-layout>
