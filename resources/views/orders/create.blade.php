<x-layout>
    <x-slot:heading>
        <x-page-heading
            pagename="{{ __('Добавить заказ') }}"
        />
    </x-slot:heading>

    <form method="POST" action="{{ route('orders.store') }}">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Создайте новый заказ</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Заполните необходимые поля формы для добавления товара</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="customer_name">ФИО покупателя</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="customer_name" id="customer_name" placeholder="Иванов Иван Иванович" required/>
                            <x-form-error name="customer_name"/>
                        </div>
                    </x-form-field>

                    <div class="sm:col-span-3">
                        <label for="product_id" class="block text-sm/6 font-medium text-gray-900">Товар</label>
                        <div class="mt-2 grid grid-cols-1">
                            <select id="product_id" name="product_id"
                                    class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
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
                            <x-form-input name="count" id="count" value="1"  type="number" required/>
                            <x-form-error name="count"/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="comment">Комментарий</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="comment" id="comment"/>
                            <x-form-error name="comment"/>
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="{{ route('products.index') }}" class="text-sm/6 font-semibold text-gray-900">Отмена</a>
            <x-form-button>Добавить</x-form-button>
        </div>
    </form>
</x-layout>
