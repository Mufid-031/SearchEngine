@props(['data' => []])

<!-- Search Stats -->
<div class="text-sm text-gray-600 dark:text-gray-400 mb-4 transition-colors">
    About {{ count($data) }} results (0.{{ rand(10, 99) }} seconds)
</div>

<!-- Search Filters (Optional) -->
<div class="mb-6 flex flex-wrap gap-2">
    <button
        class="px-3 py-1 bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-300 rounded-full text-sm hover:bg-blue-100 dark:hover:bg-blue-800 transition-colors">
        Fiction
    </button>
    <button
        class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full text-sm hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
        Non-fiction
    </button>
    <button
        class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full text-sm hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
        Bestsellers
    </button>
    <button
        class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full text-sm hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
        New releases
    </button>
    <button
        class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full text-sm hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
        Under $20
    </button>
</div>
