<?php

Namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'logo',
        'website',

    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'company_id', 'id');
    }
}
