@if (isset($list) && $list !== null && count($list) > 0)
    <ul role="list" class="divide-y divide-white/5">
        @foreach ($list as $item)
            <li class="relative flex items-center space-x-4 py-4">
                <div class="min-w-0 flex-auto">
                    <div class="flex items-center gap-x-3">
                        <h2 class="min-w-0 text-sm font-semibold leading-6 text-white">
                            {{ $item['name'] }}
                        </h2>
                    </div>
                    <div class="mt-1 flex items-center gap-x-2.5 text-xs leading-3 text-gray-400">
                        <p class="whitespace-nowrap">{{ $item['path'] }}</p>
                    </div>
                </div>

                <a href="{{ route('stack.edit', ['slug' => $item['slug']]) }}">
                    <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </li>
        @endforeach
    </ul>
@endif
