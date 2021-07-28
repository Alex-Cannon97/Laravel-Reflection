<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

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
        try{
            return $this->create(compact(['foreign_id','firstName','lastName', 'companyName','email','phone']));
        }catch(QueryException $e){
            $error = $e->errorInfo[1];
            if($error == 1062){
                return back()->withErrors($error);
            }
        }
    }
}
