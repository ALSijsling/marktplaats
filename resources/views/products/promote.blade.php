<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 leading-tight">
            {{ __('Promote Your Product') }}
        </h2>
    </x-slot>

    <div class="bg-slate-300 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-100 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mx-6 my-6 text-center text-gray-600">
                    <p>Promote the following product:</p>
                    <p class="mt-4 font-semibold">{{$product->title}}</p>

                    <form method="POST" action="{{route('promote.store', ['product' => $product])}}">
                        @csrf
                        <x-primary-button class="mt-6">Promote</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>