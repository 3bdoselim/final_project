<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchOrderDetail extends Model
{
    use HasFactory;

    public function branch_order()
    {
        return $this->belongsTo(BranchOrder::class, 'branch_order_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'id', 'product_id');
    }

}
