@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm font-bold uppercase text-gray-500 mb-2']) }}>
    {{ $value ?? $slot }}
</label>
