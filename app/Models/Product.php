<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'size'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }
}


