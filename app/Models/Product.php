<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactories;


class Product extends Model
{
    
    protected $fillable = [
        'name',
        'code',
        'description',
        'price',
        'category_product_id'
    ];

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_product_id');
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}

