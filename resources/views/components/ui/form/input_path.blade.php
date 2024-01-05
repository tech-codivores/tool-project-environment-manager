@props(['name', 'label'])

<div class="mt-2">
    <label for="{{ $name }}" class="text-sm font-medium leading-6 text-gray-100">
        {{ $label }}
    </label>

    <div class="float-right" wire:click="onPathClick('{{ $name }}')">
        <svg class="h-6 w-6 cursor-pointer text-gray-100 hover:text-gray-400" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
        </svg>
    </div>

    <div class="mt-2">
        <input id="{{ $name }}" name="{{ $name }}" type="text"
            class="block w-full rounded-md border-0 bg-gray-800 p-2 text-sm text-gray-400 shadow-sm placeholder:text-gray-400 focus:outline-red-600 focus:ring-2 focus:ring-inset focus:ring-red-600"
            {{ $attributes }}>

        @error($name)
            <div class="mt-1 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
</div>
