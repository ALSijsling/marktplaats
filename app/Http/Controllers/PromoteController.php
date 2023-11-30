<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PromoteController extends Controller
{
    public function create(Product $product)
    {
        return view('products.promote', [
            'product' => $product
        ]);
    }

    public function store(Product $product)
    {
        $product->sort_date = now();
        $product->save();
        
        return redirect('home');
    }
}
