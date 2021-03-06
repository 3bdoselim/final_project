<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    public function sections()
    {
        return $this->hasMany(BranchSection::class,"branch_id","id");
    }

    public function employees()
    {
        return $this->hasMany(Employee::class,"branch_id","id");
    }
}