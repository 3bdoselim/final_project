<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchOrder extends Model
{
    use HasFactory;

    public function branch()
    {
        return $this->belongsTo(Branch::class,"branch_id","id");

    }

    public function details()
    {
        return $this->hasMany(BranchOrderDetail::class, 'branch_order_id', 'id');
    }
}
