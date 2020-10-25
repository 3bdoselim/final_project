<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class BranchSection extends Model
{
    use HasFactory;
    protected $table = "branch_sections";
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    public function sections()
    {
        return $this->hasMany(Section::class,'id','branch_section_name');
    }

}
