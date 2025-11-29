@props([
    'label' => '',
    'name' => '',
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'required' => false,
])

<div class="space-y-1">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-600 tracking-wide">{{ $label }}@if($required)<span class="text-red-500">*</span>@endif</label>

    @if($type === 'textarea')
        <textarea id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }}
            class="block w-full rounded-xl border border-gray-200 bg-white/60 px-4 py-3 text-gray-900 placeholder-gray-400 shadow-sm transition focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-indigo-600">{{ old($name, $value) }}</textarea>
    @else
        <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }}
            class="block w-full rounded-xl border border-gray-200 bg-white/60 px-4 py-3 text-gray-900 placeholder-gray-400 shadow-sm transition focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-indigo-600" />
    @endif

    @error($name)
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>
