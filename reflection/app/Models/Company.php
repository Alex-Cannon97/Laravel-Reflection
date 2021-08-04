<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'email',
        'logo',
        'website',

    ];

    protected function Employee()
    {
        return $this->hasMany(Employee::class, 'company_id', 'id');
    }
}
