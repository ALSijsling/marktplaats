<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-head></x-head>

    <x-body>
        <div class="lg:w-2/4 mx-auto sm:my-8 p-4 text-center text-gray-600 rounded-md bg-white shadow">
            <h1 class="font-bold">{{ $product->title }}</h1>
            <article class="pt-6">{{ $product->description }}</article>
        </div>
    </x-body>
</html>
