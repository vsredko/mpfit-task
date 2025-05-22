<!doctype html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Website</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="h-full">
<div class="min-h-full">
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <img class="size-8"
                             src="https://tailwindui.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                             alt="">
                    </div>

                    <div class="ml-10 flex items-baseline space-x-4">
                        <x-nav-link href="{{ route('products.index') }}" :active="request()->is('products')" >{{ __('Товары') }}</x-nav-link>
                        <x-nav-link href="{{ route('orders.index') }}" :active="request()->is('orders')" >{{ __('Заказы') }}</x-nav-link>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <header class="bg-white shadow-sm">
        {{ $heading }}
    </header>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>
</div>
</body>
</html>
