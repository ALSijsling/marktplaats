<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-head></x-head>

    <x-body>
        <div class="lg:w-2/4 mx-auto sm:my-8 p-4 text-center text-gray-600 rounded-md bg-slate-100 shadow">
            <h1 class="text-xl font-bold">{{ $product->title }}</h1>
            <p class="mt-4">
                <a href="{{route('users.show', ['user' => $product->user])}}">
                    <i class='fas fa-user-circle' style='font-size:20px;color:dimgrey'></i><span class="ml-1 text-gray-600 hover:text-gray-900">{{$product->user->name}}</span>
                </a>
            </p>
            <article class="mt-4">{{ $product->description }}</article>
            <p class="mt-4">&euro; {{$product->price}}</p>
        </div>
        <div class="lg:w-2/5 mx-auto sm:my-8 p-4 text-center text-gray-600 rounded-md bg-slate-100 shadow">
            <h3 class="text-lg font-bold">Bids</h3>
            <ul>
                @foreach ($product->bids as $bid)
                    <li>&euro; {{$bid->price}} by {{$bid->user->name}}</li>
                @endforeach
            </ul>
            @auth
                <form class="mt-10 w-2/5 mx-auto" method="POST" action="{{route('bids.store')}}">
                    @csrf
                    <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                    <div class="p-4">
                        <x-input-label for="price" :value="__('Your Bid')" />
                        <div class="relative mt-4 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="sm:text-sm md:text-md">&euro;</span>
                            </div>
                            <x-text-input id="price" class="block w-full mx-auto border-0 py-1.5 pl-7" type="number" min="0" max="9999.99" step="0.01" name="price" :value="old('price')" placeholder="0.00" required autofocus />
                        </div>
                    </div>
                    <div class="mt-2">
                        <x-primary-button>
                            {{ __('Place Bid')}}
                        </x-primary-button>
                    </div>
                </form>
            @endauth
        </div>
    </x-body>
</html>
