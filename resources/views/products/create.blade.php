<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 leading-tight">
            {{ __('New Product') }}
        </h2>
    </x-slot>

    <div class="bg-slate-300 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-100 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mx-6 mb-6 text-gray-600">
                    <form method="POST" action="{{route('products.store')}}">
                        @csrf

                        <!-- Title -->
                        <x-form-input>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </x-form-input>

                        <!-- Description -->
                        <x-form-input>
                            <x-input-label for="description" :value="__('Description')" />
                            <x-textarea-input id="description" rows="10" class="block mt-1 w-full" name="description" :value="old('description')" required></x-textarea-input>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </x-form-input>

                        <!-- Image -->

                        <!-- Category -->

                        <!-- Price -->
                        <x-form-input>
                            <x-input-label for="price" :value="__('Your Minimum Price')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" min="0" max="9999.99" step="0.01" name="price" :value="old('price')" required />
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
