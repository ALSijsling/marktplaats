<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="bg-slate-300 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-100 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mx-6 mb-6 text-gray-600">
                    <form method="POST" action="{{route('products.update', ['product' => $product])}}">
                        @method('PATCH')
                        @csrf

                        <!-- Title -->
                        <x-form-input>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$product->title" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </x-form-input>

                        <!-- Description -->
                        <x-form-input>
                            <x-input-label for="description" :value="__('Description')" />
                            <x-textarea-input id="description" rows="10" class="block mt-1 w-full" name="description" :value="old('description')" required>{{$product->description}}</x-textarea-input>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </x-form-input>

                        <!-- Image -->

                        <!-- Category -->
                        <x-form-input>
                            <x-input-label for="category" :value="__('Category')" />
                            <x-text-input list="category" name="category" :value="$product->category" required />
                                <datalist id="category">
                                    @foreach (\App\Models\Category::all() as $category)
                                        <option value="{{$category->name}}"></option>
                                    @endforeach
                                </datalist>
                        </x-form-input>

                        <!-- Price -->
                        <x-form-input>
                            <x-input-label for="price" :value="__('Your Minimum Price')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" min="0" max="9999.99" step="0.01" :value="$product->price" required />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </x-form-input>

                        <x-form-input>
                            <x-primary-button>
                                {{ __('Place Product')}}
                            </x-primary-button>
                        </x-form-input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
