<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-head></x-head>
    
    <x-body>
        <div class="lg:m-10 w-full text-center text-gray-600">
            @foreach ($products as $product)
                <div class="sm:w-full md:w-1/2 lg:w-1/4 xl:w-1/6 p-4 bg-white shadow rounded-md">
                    <a href="/products/{{ $product->slug }}" class="font-bold hover:text-gray-900">{{ $product->title }}</a>
                    <article class="pt-6">{{ $product->description }}</article>
                </div>
            @endforeach
        </div>
    </x-body>
</html>
