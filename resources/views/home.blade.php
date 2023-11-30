<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-head></x-head>

    <x-body>
        <div class="py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="flex justify-between">
                    <!-- Category Filter -->
                    <div class="group float-left bg-slate-400 rounded-xl hover:bg-slate-500">
                        <button class="menu-hover p-4">Categories</button>
                        <div class="absolute invisible rounded-xl shadow bg-slate-400 group-hover:visible z-10">
                            @foreach(\App\Models\Category::all() as $category)
                                <a class="block p-4 hover:bg-slate-500" href="{{route('categories.show', ['category' => $category])}}">{{$category->name}}</a>
                            @endforeach
                        </div>
                    </div>
                    <!-- SearchBar -->
                    <form id="searchBar" method="GET" action="#">
                        <x-text-input type="text" name="search" placeholder="Search.." value="{{request('search')}}" />
                        <button type="submit"><i class="fa fa-fw fa-search"></i></button>
                    </form>
                </div>
                <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 md:grid-cols-2 lg:max-w-none lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($products as $product)
                        <article class="bg-slate-100 text-gray-600 flex max-w-xl flex-col items-start justify-between p-6 rounded-2xl">
                            <div class="relative mb-6 flex items-center gap-x-4">
                                <div class="text-sm leading-6">
                                    <a href="/products/{{$product->slug}}">
                                        <h3 class="ml-2 text-lg font-semibold group-hover:text-gray-800">
                                            {{$product->title}}
                                        </h3>
                                    </a>
                                </div>
                            </div>
                            <div class="flex items-center gap-x-4 text-xs">
                                <time class="text-gray-500">{{$product->created_at->toDateString()}}</time>
                                    <a href="{{route('categories.show', ['category' => $product->category])}}" class="relative rounded-full bg-slate-200 px-3 py-1.5 font-medium hover:bg-slate-300">{{$product->category}}</a>
                            </div>
                            <div class="group relative">
                                <p class="mt-4">
                                    <a href="{{route('users.show', ['user' => $product->user])}}">
                                        <i class='fas fa-user-circle' style='font-size:20px;color:dimgrey'></i><span class="ml-1 hover:text-gray-900">{{$product->user->name}}</span>
                                    </a>
                                </p>
                                <p class="mt-4 line-clamp-5 text-sm">{{$product->description}}</p>
                            </div>
                            <div class="mt-4 text-sm">
                                <p>&euro; {{$product->price}}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
                <div class="mt-8">
                    {{$products->links()}}
                </div>              
            </div>
        </div>
    </x-body>
</html>
