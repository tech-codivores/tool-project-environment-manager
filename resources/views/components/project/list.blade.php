@if (isset($list) && $list !== null && count($list) > 0)
    <ul role="list" class="divide-y divide-white/5">
        @foreach ($list as $item)
            <li class="relative flex items-center space-x-4 py-4">
                <div class="min-w-0 flex-auto">
                    <div class="flex items-center gap-x-3">
                        <div @class([
                            'flex-none rounded-full p-1',
                            'bg-gray-100/10 text-gray-500' => !in_array($item['slug'], $runningList),
                            'bg-green-400/10 text-green-400' => in_array($item['slug'], $runningList),
                        ])>
                            <div class="h-2 w-2 rounded-full bg-current"></div>
                        </div>

                        <h2 class="min-w-0 text-sm font-semibold leading-6 text-white">
                            {{ $item['name'] }}
                        </h2>
                    </div>
                </div>
                @if (in_array($item['slug'], $runningList))
                    <a href="{{ route('project.stop', ['slug' => $item['slug']]) }}">
                        <svg class="h-6 w-6 text-gray-400 hover:text-red-400" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 9.563C9 9.252 9.252 9 9.563 9h4.874c.311 0 .563.252.563.563v4.874c0 .311-.252.563-.563.563H9.564A.562.562 0 0 1 9 14.437V9.564Z" />
                        </svg>
                    </a>
                @else
                    <a href="{{ route('project.start', ['slug' => $item['slug']]) }}">
                        <svg class="h-6 w-6 text-gray-400 hover:text-green-400" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.91 11.672a.375.375 0 0 1 0 .656l-5.603 3.113a.375.375 0 0 1-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112Z" />
                        </svg>
                    </a>
                @endif

                <a href="{{ route('project.edit', ['slug' => $item['slug']]) }}">
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
