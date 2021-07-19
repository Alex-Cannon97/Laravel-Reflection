<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;
use App\Models\companies;

class employeesController extends Controller
{
    public function show($id)
   {
       $employees =employees::where('company', $id)->orderBy('firstName')->paginate(10);
       return view('layouts.employees',['employees'=>$employees]);
   }


}
