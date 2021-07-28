<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

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
    
    public function addCompany($Name, $email, $logo, $website)
    {
        try{
        return $this->create(compact(['Name', 'email', 'logo', 'website']));
         }catch(QueryException $e){
            $error = $e->errorInfo[1];
            if($error == 1062){
                return back()->withErrors($error);
            }
         }
    }
}
