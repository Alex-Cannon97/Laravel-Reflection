<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
            'company_id',
            'first_name',
            'last_name',
            'company_name',
            'email',
            'phone',

    ];

    protected function company()
    {
        return $this->belongsTo(Company::class, 'company_id','id' );
    }
}
