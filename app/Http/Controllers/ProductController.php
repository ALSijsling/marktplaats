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
            'products' => Product::orderByDesc('created_at')->filter(request(['search']))->paginate(12)
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

        $product = Product::create($attributes);

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
        return view('products.edit', [
            'product' => $product
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $attributes = $request->validated();

        $attributes['slug'] = Str::slug($attributes['title']);

        $product->update($attributes);

        return redirect('/dashboard');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/dashboard');
    }
}
