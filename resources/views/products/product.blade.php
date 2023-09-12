<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-head></x-head>

    <x-body>
        <div class="lg:w-2/4 mx-auto sm:my-8 p-4 text-center text-gray-600 rounded-md bg-slate-100 shadow">
            <!-- change img scr -->
            <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="mx-auto h-150 w-150 rounded-lg bg-gray-50">
            <h1 class="text-xl font-bold">{{ $product->title }}</h1>
            <p class="mt-4">
                <!-- add user-link -->
                <a href="#">
                    <i class='fas fa-user-circle' style='font-size:20px;color:dimgrey'></i><span class="ml-1 text-gray-600 hover:text-gray-900">{{$product->user->name}}</span>
                </a>
            </p>
            <article class="mt-6">{{ $product->description }}</article>
        </div>
    </x-body>
</html>
