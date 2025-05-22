@props(['order'])

<x-panel class="flex gap-x-6">
    <div class="text-center flex-1 flex flex-col">
        <h3 class="font-bold text-xl mt-3 group-hover:text-blue-500 transition-colors duration-300">
            <a href="{{ route('orders.edit', $order->id) }}">
                {{ __('Номер заказа: ') . $order->id}}
            </a>
        </h3>

        <p>
            {{ __('ФИО: ') . $order->customer_name }}
        </p>

        <p>
            {{ __('Статус: ') . $order->status->name}}
        </p>

        <p>
            {{ __('Общая стоимость: ') . $order->total_price }}
        </p>

        <p>
            {{ __('Дата создания: ') . $order->created_at }}
        </p>
    </div>
</x-panel>

