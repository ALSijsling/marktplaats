<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Http\Requests\StoreBidRequest;
use App\Http\Requests\UpdateBidRequest;

class BidController extends Controller
{
    public function store(StoreBidRequest $request)
    {
        $attributes = $request->validated();
        $attributes['user_id'] = auth()->id();

        Bid::create($attributes);

        return redirect('/');
    }
}
