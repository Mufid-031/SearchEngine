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

                         <!-- Rating Stars (decorative) -->
                         {{-- <div class="flex text-yellow-400">
                          @for ($i = 0; $i < 5; $i++)
                              @if ($i < rand(3, 5))
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                      viewBox="0 0 20 20" fill="currentColor">
                                      <path
                                          d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                  </svg>
                              @else
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                      fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                  </svg>
                              @endif
                          @endfor
                          <span
                              class="ml-1 text-xs text-gray-500 dark:text-gray-400 transition-colors">({{ rand(10, 500) }})</span> --}}
                      {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <x-action />
    </div>
</div>
