@props(['query' => ''])

<div
    class="w-full h-screen text-center text-gray-600 dark:text-gray-400 flex justify-center items-center gap-2 text-2xl">
    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="lucide lucide-unplug-icon lucide-unplug">
        <path d="m19 5 3-3" />
        <path d="m2 22 3-3" />
        <path d="M6.3 20.3a2.4 2.4 0 0 0 3.4 0L12 18l-6-6-2.3 2.3a2.4 2.4 0 0 0 0 3.4Z" />
        <path d="M7.5 13.5 10 11" />
        <path d="M10.5 16.5 13 14" />
        <path d="m12 6 6 6 2.3-2.3a2.4 2.4 0 0 0 0-3.4l-2.6-2.6a2.4 2.4 0 0 0-3.4 0Z" />
    </svg>
    No Results for {{ $query }}
</div>
