@php
    $classes = 'p-4 bg-gray-600 rounded-xl border border-transparent hover:border-blue-700 transition-colors duration-900 group';
@endphp

<div {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</div>
