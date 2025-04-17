@props(['item'])

<div
    class="max-w-3xl bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4 border border-gray-200 dark:border-gray-700 transition-colors card-result">
    <div class="flex flex-col">
        <div class="flex items-center text-xs text-gray-600 dark:text-gray-400 mb-1 transition-colors">
            <span class="truncate">quran.com › {{ $item['surah_id'] }}/{{ $item['ayah'] }}</span>
        </div>
        <h3 class="text-xl text-blue-800 dark:text-blue-400 hover:underline font-medium mb-1 transition-colors">
            <a href="#">Surah {{ $item['surah_latin'] }}
                ({{ $item['surah_translation'] ?? '' }})
                - Verse {{ $item['ayah'] }}</a>
        </h3>

        <!-- Arabic Text -->
        <div
            class="my-3 text-right text-xl font-arabic text-gray-900 dark:text-gray-100 transition-colors leading-loose">
            {{ $item['arabic'] }}
        </div>

        <div class="flex items-start">
            <div>
                <!-- Translation -->
                <p class="text-sm text-gray-700 dark:text-gray-300 mb-1 transition-colors">
                    <span class="font-medium">Translation:</span> {{ $item['translation'] }}
                </p>

                <!-- Transliteration -->
                <p class="text-sm text-gray-600 dark:text-gray-400 italic mb-2 transition-colors">
                    <span class="font-medium">Transliteration:</span> {{ $item['latin'] }}
                </p>

                <!-- Brief Tafsir -->
                @if (!empty($item['tafsir_wajiz']))
                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-1 transition-colors">
                        {{ Str::limit($item['tafsir_wajiz'], 150) }}
                        <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Read more</a>
                    </p>
                @endif

                <div class="flex items-center mt-2">
                    <!-- Metadata Tags -->
                    <div class="flex flex-wrap gap-2">
                        <span
                            class="px-2 py-1 bg-green-50 dark:bg-green-900/30 text-green-700 dark:text-green-300 rounded-full text-xs">
                            Juz {{ $item['juz'] }}
                        </span>
                        <span
                            class="px-2 py-1 bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 rounded-full text-xs">
                            Page {{ $item['page'] }}
                        </span>
                        @if (!empty($item['surah_location']))
                            <span
                                class="px-2 py-1 bg-purple-50 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 rounded-full text-xs">
                                {{ $item['surah_location'] }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <x-search.action />
    </div>
</div>
