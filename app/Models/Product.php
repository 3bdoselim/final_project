<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function colors()
    {
        return $this->hasMany(Color::class,"id","product_color");
    }

    public function sizes()
    {
        return $this->hasMany(Size::class,"id","product_size");
    }
}