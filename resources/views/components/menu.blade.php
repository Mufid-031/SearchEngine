@props([
    'menu' => [
        [
            'title' => 'All',
            'url' => 'search',
        ],
        [
            'title' => 'Images',
            'url' => 'search/images',
        ],
    ],
])

<nav class="flex w-full justify-between items-center mb-3">
    <ul class="flex gap-5 items-center">
        @foreach ($menu as $item)
            <li class="flex gap-1 items-center {{ request()->is($item['url']) ? 'text-red-600' : 'text-white' }}">
                <a href="/{{ $item['url'] }}">{{ $item['title'] }}</a>
            </li>
        @endforeach
    </ul>
    <div class="flex items-center gap-5">
        <x-untitledui-settings-toggle-line class="w-4 h-4 text-white rotate-90" />
    </div>
</nav>
