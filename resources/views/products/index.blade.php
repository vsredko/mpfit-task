<x-layout>
    <x-slot:heading>
        <x-page-heading
            pagename="{{ __('Список товаров') }}"
            :route="route('products.create')"
            buttonname="{{ __('Добавить товар') }}"
        />
    </x-slot:heading>

    <div class="mt-5 pb-5">
        {{ $products->onEachSide(1)->links() }}
    </div>

    <div class="space-y-6">
        @foreach($products as $product)
            <x-product-card :$product/>
        @endforeach
    </div>

    <div class="mt-5 pb-5">
        {{ $products->onEachSide(1)->links() }}
    </div>
</x-layout>
