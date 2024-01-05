<div>
    <div class="relative z-10 @if (!$show) hidden @endif" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex items-center justify-center px-0 py-4">
                <div class="relative mx-2 w-full transform overflow-hidden pb-10 pt-4 shadow-xl transition-all">
                    <div class="absolute right-0 top-0 pr-2">
                        <button type="button" class="rounded-md bg-white text-gray-400 hover:text-gray-500"
                            wire:click="$dispatch('command-output-close')">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="overflow-y max-h-max rounded-lg bg-black p-4">
                        <pre class="overflow-y-auto whitespace-pre-line" style="font-family: monospace;">{!! $content !!}</pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
