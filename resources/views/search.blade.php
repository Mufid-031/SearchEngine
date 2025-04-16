{{-- {{ dd($data) }} --}}

<x-layout class="min-h-screen transition-colors dark:bg-gray-900 dark:text-gray-100">
    <div class="fixed inset-0 z-[-1] overflow-hidden bg-gray-50 dark:bg-gray-900 transition-colors">
        <!-- Subtle background pattern instead of full image -->
        <div
            class="absolute inset-0 bg-gradient-to-b from-white to-gray-100 opacity-80 dark:from-gray-900 dark:to-gray-800 transition-colors">
        </div>
    </div>

    <!-- Search Header Section -->
    <x-navbar :query="$query" />

    <!-- Search Results Section -->
    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">

        <!-- Results Display -->
        @if (request('type') === 'images')
            <!-- Image Results Layout -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                @foreach ($data as $item)
                    <div class="group">
                        <div class="mt-2">
                            <h3 class="text-sm text-gray-700 dark:text-gray-300 line-clamp-1 transition-colors">
                                {{ $item['surah_latin'] }} {{ $item['ayah'] }}
                            </h3>
                        </div>
                    </div>
                @endforeach
            </div>
        @elseif(request('type') === 'shopping')
            <!-- Shopping Results Layout -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($data as $item)
                    <div
                        class="bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200 overflow-hidden border border-gray-200 dark:border-gray-700">
                        <div class="p-4">
                            <h3
                                class="text-md font-medium text-gray-800 dark:text-gray-200 line-clamp-2 transition-colors">
                                {{ $item['surah_latin'] }} {{ $item['ayah'] }}</h3>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 line-clamp-2">
                                {{ $item['translation'] }}
                            </p>
                            <div class="mt-2 flex items-center">
                                <div class="flex text-yellow-400">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < rand(3, 5))
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                                <span
                                    class="ml-1 text-xs text-gray-500 dark:text-gray-400 transition-colors">({{ rand(10, 500) }}
                                    reviews)</span>
                            </div>
                            <button
                                class="mt-3 w-full bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600 text-white py-2 rounded-md text-sm font-medium transition-colors duration-200">
                                View Details
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Default/All Results Layout (Google-like) -->
            <div class="space-y-6">
                @foreach ($data as $item)
                    <x-card :item="$item" />
                @endforeach
            </div>
        @endif

        <!-- Pagination -->
        <div class="mt-4">
            {{ $data->links() }}
        </div>
    </main>

    <!-- Footer -->
    <x-footer />

    <script>
        function clearSearch(form) {
            form.query.value = '';
            form.submit();
        }

        const toggleDarkMode = document.querySelector('#toggleDarkMode');
        toggleDarkMode.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
        })
    </script>
</x-layout>
