<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Order extends Model
{
    protected $fillable = [
        'customer_name',
        'status',
        'comment',
        'product_id',
        'quantity',
        'total_price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
