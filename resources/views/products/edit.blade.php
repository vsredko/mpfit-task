<x-layout>
    <x-slot:heading>
        <form method="POST" action="{{ route('products.destroy', $product->id) }}">
            @csrf
            @method('DELETE')

            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                    {{ __('Товар:  ') . $product->name }}
                </h1>

                <x-form-button  class="bg-red-500 hover:bg-red-700 w-33 ">Удалить товар</x-form-button>
            </div>
        </form>
    </x-slot:heading>

    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PATCH')

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Просмотр информации о товаре</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Измените параметры товара при необходимости</p>
                <p class="mt-6 text-sm/6 text-gray-600">Дата создания товара: {{ $product->created_at }}</p>
                <p class="mt-1 text-sm/6 text-gray-600">Дата последнего редактирования: {{ $product->updated_at }}</p>

                <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="name">Название</x-form-label>
                        <div class="mt-2">
                            <x-form-input value="{{ $product->name }}" name="name" id="name" placeholder="Смартфон Vivo" required/>
                            <x-form-error name="name"/>
                        </div>
                    </x-form-field>

                    <div class="sm:col-span-3">
                        <label for="category_id" class="block text-sm/6 font-medium text-gray-900">Категория</label>
                        <div class="mt-2 grid grid-cols-1">
                            <select id="category_id" name="category_id"
                                    class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                @foreach($categories as $category)
                                    @if($category->id == $product->category->id)
                                        <option selected value="{{ $category->id }}" >{{ $category->name }}</option>
                                    @endif

                                    @if($category->id !== $product->category->id)
                                        <option value="{{ $category->id }}" >{{ $category->name }}</option>
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
                        <x-form-label for="price">Цена</x-form-label>
                        <div class="mt-2">
                            <x-form-input value="{{ $product->price}}" name="price" id="price" type="number" step="0.01" placeholder="19100.99" required/>
                            <x-form-error name="price"/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="description">Описание</x-form-label>
                        <div class="mt-2">
                            <x-form-input value="{{ $product->description }}" name="description" id="description"/>
                            <x-form-error name="description"/>
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
