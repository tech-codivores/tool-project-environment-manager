@props(['name', 'label', 'options'])

<div class="mt-2">
    <label for="{{ $name }}" class="block text-sm font-medium leading-6 text-gray-100">
        {{ $label }}
    </label>

    <div class="mt-2">
        <select id="{{ $name }}" name="{{ $name }}"
            class="mt-2 block w-full rounded-md border-0 bg-gray-800 p-2 text-sm text-gray-400 shadow-sm placeholder:text-gray-400 focus:outline-red-600 focus:ring-2 focus:ring-inset focus:ring-red-600"
            {{ $attributes }}>
            @foreach ($options as $value => $label)
                <option value="{{ $value }}">{{ $label }}</option>
            @endforeach
        </select>
        @error($name)
            <div class="mt-1 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
</div>
