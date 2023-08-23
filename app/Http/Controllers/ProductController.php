<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function index()
    {
        return view('home', [
            'products' => Product::all()
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $attributes = $request->validated();

        $attributes['user_id'] = auth()->id();
        $attributes['slug'] = Str::slug($attributes['title']);

        Product::create($attributes);

        return redirect('dashboard');
    }

    public function show(Product $product)
    {
        return view('products.product', [
            'product' => $product
        ]);
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
