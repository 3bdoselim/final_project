<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrderDetail extends Model
{
    use HasFactory;

    public function customer_order()
    {
        return $this->hasMany(CustomerOrder::class, 'id', 'customer_order_id');
    }

        
    public function products()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}
