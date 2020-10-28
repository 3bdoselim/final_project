<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function jobs()
    {
        return $this->hasMany(Job::class, 'id', 'job_id');
    }

    public function users()
    {
        return $this->hasMany(User::class,'id', 'user_id');
    }

    public function branches()
    {
        return $this->hasMany(Branch::class, 'id', 'branch_id');
    }

    public function managers()
    {
        return $this->hasMany(Employee::class, 'id', 'manager_id');
    }
}
