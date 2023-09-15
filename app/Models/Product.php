<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class, 'products_categories');
    }

    public function bids() {
        return $this->hasMany(Bid::class);
    }
}
