<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-head></x-head>
    
    <x-body>
        <div class="py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 md:grid-cols-2 lg:max-w-none lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($products as $product)
                        <article class="bg-slate-100 flex max-w-xl flex-col items-start justify-between p-6 rounded-2xl">
                            <div class="relative mb-6 flex items-center gap-x-4">
                                <!-- change image -->
                                <img class="h-10 w-10 rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                <div class="text-sm leading-6">
                                    <a href="/products/{{$product->slug}}">
                                        <h3 class="ml-2 text-lg font-semibold text-gray-600 group-hover:text-gray-800">
                                            {{$product->title}}
                                        </h3>
                                    </a>
                                </div>
                            </div>
                            <div class="flex items-center gap-x-4 text-xs">
                                <time datetime="2020-03-16" class="text-gray-500">{{$product->updated_at}}</time>
                                @foreach($product->categories as $category)
                                    <a href="{{route('categories.show', ['category' => $category])}}" class="relative z-10 rounded-full bg-slate-200 px-3 py-1.5 font-medium text-gray-600 hover:bg-slate-300">{{$category->name}}</a>
                                @endforeach
                            </div>
                            <div class="group relative">
                                <p class="mt-4">
                                    <a href="{{route('users.show', ['user' => $product->user])}}">
                                        <i class='fas fa-user-circle' style='font-size:20px;color:dimgrey'></i><span class="ml-1 text-gray-600 hover:text-gray-900">{{$product->user->name}}</span>
                                    </a>
                                </p>
                                <p class="mt-4 line-clamp-5 text-sm text-gray-600">{{$product->description}}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </x-body>
</html>
