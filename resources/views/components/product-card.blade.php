@props(['product'])

<x-panel class="flex gap-x-6">
    <div class="text-center flex-1 flex flex-col">
        <h3 class="font-bold text-xl mt-3 group-hover:text-blue-500 transition-colors duration-300">
            <a href="{{ route('products.edit', $product->id) }}">
                {{ $product->name}}
            </a>
        </h3>

        <p>
            {{ __('Цена: ') .$product->price . __(' руб') }}
        </p>

        <p>
            {{ __('Категория: ') . $product->category->name}}
        </p>
    </div>
</x-panel>

