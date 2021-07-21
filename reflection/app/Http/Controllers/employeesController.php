<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;
use App\Models\companies;

class employeesController extends Controller
{
    public function show($id)
   {
       $employees =employees::where('foreign-id', $id)->paginate(10);
       $company = companies::where('id', $id)->paginate(1);
       return view('layouts.employees',[
           'employees'=>$employees,
           'company'=>$company,
        ]);
   }

   public function destroy($id)
    {
        $employees = employees::find($id);
        $employees->delete();
        return back();
    }
}
