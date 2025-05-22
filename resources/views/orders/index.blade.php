<x-layout>
    <x-slot:heading>
        <x-page-heading
            pagename="{{ __('Список заказов') }}"
            :route="route('orders.create')"
            buttonname="{{ __('Добавить заказ') }}"
        />
    </x-slot:heading>

    <div class="mt-5 pb-5">
        {{ $orders->onEachSide(1)->links() }}
    </div>

    <div class="space-y-6">
        @foreach($orders as $order)
            <x-order-card :$order/>
        @endforeach
    </div>

    <div class="mt-5 pb-5">
        {{ $orders->onEachSide(1)->links() }}
    </div>
</x-layout>
