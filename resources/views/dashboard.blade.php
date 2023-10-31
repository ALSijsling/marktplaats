<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <form method="GET" action="{{route('dashboard')}}">
                    @csrf
                    <select class="bg-slate-100 rounded-md border-slate-300 shadow-md" name="sorting">
                        <option value="created_at">Date</option>
                        <option value="price">Price</option>
                    </select>
                    <button class="ml-2 px-4 py-2 bg-slate-100 rounded-md border-slate-300 shadow-md" type="submit">Sort</button>
                </form>
            </div>
            <div class="bg-slate-100 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-600">
                    <ul role="list" class="divide-y divide-slate-300">
                        @foreach ($products as $product)
                            <li class="flex justify-between gap-x-6 py-5">
                                <div class="flex min-w-0 gap-x-4 items-center">
                                    <!-- change img scr -->
                                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50 hidden md:block" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    <div class="min-w-0 flex-auto">
                                        <a href="/products/{{$product->slug}}">
                                            <h3 class="text-md font-semibold">{{$product->title}}</h3>
                                        </a>
                                        <div class="inline-flex text-gray-500 text-xs">
                                            <time>{{$product->updated_at->toDateString()}}</time>
                                            <p class="ml-6">&euro; {{$product->price}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-row sm:flex-col sm:items-end">
                                    <form action="{{route('products.edit', ['product' => $product])}}" method="GET" class="lg:inline-flex">
                                        @csrf
                                        <button type="submit" class="px-4 py-2 bg-white border border-slate-300 rounded-md font-semibold text-xs text-gray-600 uppercase shadow-sm hover:bg-slate-200">Edit</button>
                                    </form>
                                    <!-- add link -->
                                    <form action="{{route('products.destroy', ['product' => $product])}}" method="POST" class="lg:inline-flex">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="px-4 py-2 mt-1 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-red-500">Delete</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
