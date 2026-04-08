<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'full_name',
        'gender',
        'department',
        'position',
        'phone',
        'email',
        'hire_date',
    ];

    protected $casts = [
        'hire_date' => 'date',
    ];
}
