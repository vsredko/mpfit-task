<x-layout>
    <x-slot:heading>
        <form method="POST" action="{{ route('orders.destroy', $order->id) }}">
            @csrf
            @method('DELETE')

            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                    {{ __('Номер заказа:  ') . $order->id }}
                </h1>

                <x-form-button class="bg-red-500 hover:bg-red-700 w-33 ">Удалить заказ</x-form-button>
            </div>
        </form>
    </x-slot:heading>

    <form method="POST" action="{{ route('orders.update', $order->id) }}">
        @csrf
        @method('PATCH')

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Просмотр информации о заказе</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Измените параметры заказа при необходимости</p>
                <p class="mt-6 text-sm/6 text-gray-600">Номер заказа: {{ $order->id }}</p>
                <p class="mt-1 text-sm/6 text-gray-600">Дата создания заказа: {{ $order->created_at }}</p>
                <p class="mt-1 text-sm/6 text-gray-600">Дата последнего редактирования: {{ $order->updated_at }}</p>

                <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="status_id" class="block text-sm/6 font-medium text-gray-900">Статус заказа</label>
                        <div class="mt-2 grid grid-cols-1">
                            <select id="status_id" name="status_id"
                                    class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                @foreach($statuses as $status)
                                    @if($status->id == $order->status->id)
                                        <option selected value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endif

                                    @if($status->id !== $order->status->id)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <svg
                                class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4"
                                viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd"
                                      d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>

                    <x-form-field>
                        <x-form-label for="customer_name">ФИО заказчика</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="customer_name" id="customer_name" value="{{ $order->customer_name }}"
                                          required/>
                            <x-form-error name="customer_name"/>
                        </div>
                    </x-form-field>

                    <div class="sm:col-span-3">
                        <label for="product_id" class="block text-sm/6 font-medium text-gray-900">Товар</label>
                        <div class="mt-2 grid grid-cols-1">
                            <select id="product_id" name="product_id"
                                    class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                @foreach($products as $product)
                                    @if($product->id == $order->product->id)
                                        <option selected value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endif

                                    @if($product->id !== $order->product->id))
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endif
                                @endforeach

                            </select>
                            <svg
                                class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4"
                                viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd"
                                      d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>

                    <x-form-field>
                        <x-form-label for="count">Количество</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="count" id="count" value="{{ $order->count }}" type="number" required/>
                            <x-form-error name="count"/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="total_price">Общая стоимость</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="total_price" id="total_price" value="{{ $order->total_price }}"
                                          disabled/>
                            <x-form-error name="total_price"/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="comment">Комментарий</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="comment" id="comment" value="{{ $order->comment }}"/>
                            <x-form-error name="comment"/>
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="{{ route('products.index') }}" class="text-sm/6 font-semibold text-gray-900">Отмена</a>
            <x-form-button>Сохранить</x-form-button>
        </div>
    </form>
</x-layout>
