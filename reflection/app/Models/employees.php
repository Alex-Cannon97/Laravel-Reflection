<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    use HasFactory;

    protected $fillable = [
            'foreign-id',
            'firstName',
            'lastName',
            'company',
            'email',
            'phone',

    ];

}
