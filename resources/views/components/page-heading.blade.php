@props(['pagename'=>false, 'route'=>false, 'buttonname'=>false, 'red'=>false])

<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
    <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $pagename }}</h1>

    @if($route)
        <x-button :$red href="{{ $route }}">{{ $buttonname }}</x-button>
    @endif
</div>
