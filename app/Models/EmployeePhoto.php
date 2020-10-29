<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePhoto extends Model
{
    use HasFactory;

    public function employees()
    {
        return $this->belongsTo(Employee::class, 'id', 'employee_id');
    }

}
