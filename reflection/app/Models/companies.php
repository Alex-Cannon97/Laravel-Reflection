<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companies extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'email',
        'logo',
        'website',

    ];

    protected function employees()
    {
        return $this->hasMany(employees::class, 'foreign_id', 'id');
    }
    
}
