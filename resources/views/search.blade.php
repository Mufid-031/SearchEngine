{{-- {{ dd($data) }} --}}

<x-layout class="min-h-screen transition-colors dark:bg-gray-900 dark:text-gray-100">
    <div class="fixed inset-0 z-[-1] overflow-hidden bg-gray-50 dark:bg-gray-900 transition-colors">
        <!-- Subtle background pattern instead of full image -->
        <div
            class="absolute inset-0 bg-gradient-to-b from-white to-gray-100 opacity-80 dark:from-gray-900 dark:to-gray-800 transition-colors">
        </div>
    </div>

    <!-- Search Header Section -->
    <x-search.navbar :query="$query" />

    <!-- Search Results Section -->
    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">

        <!-- Results Display -->
        @if (request('type') === 'images')
            <!-- Image Results Layout -->
            <x-search.development />
        @elseif(request('type') === 'shopping')
            <!-- Shopping Results Layout -->
            <x-search.development />
        @elseif(request('type') === 'books')
            <!-- Book Results Layout -->
            <x-search.development />
        @elseif(request('type') === 'news')
            <!-- News Results Layout -->
            <x-search.development />
        @else
            <!-- Default/All Results Layout (Google-like) -->
            <div class="space-y-6">
                @forelse ($data as $item)
                    <x-search.card :item="$item" />
                @empty
                    <x-search.notfound :query="$query" />
                @endforelse
            </div>
        @endif

        <!-- Pagination -->
        <div class="mt-4">
            {{ $data->links() }}
        </div>
    </main>

    <!-- Footer -->
    <x-search.footer />
</x-layout>
