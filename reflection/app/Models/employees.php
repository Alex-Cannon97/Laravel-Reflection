<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    use HasFactory;

    protected $fillable = [
            'foreign_id',
            'firstName',
            'lastName',
            'companyName',
            'email',
            'phone',

    ];

    protected function company()
    {
        return $this->belongsTo(companies::class, 'foreign_id','id' );
    }


    public function addEmployees( $foreign_id ,$firstName, $lastName, $companyName, $email, $phone)
    {
        return $this->create(compact(['foreign_id','firstName','lastName', 'companyName','email','phone']));
    }
}
