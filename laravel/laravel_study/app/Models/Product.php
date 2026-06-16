<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'price',
        'description',
        'stock',
    ];

    public function reduceStock($quantity)
    {
        if ($quantity <= 0) {
            throw new \InvalidArgumentException('数量が不正です。');
        }

        return $this->decrement('stock', $quantity);
    }
}
