<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;

class EmployeeController extends Controller
{
    public function index($id)
   {
       $employees =Employee::where('company_id', $id)->paginate(10);
       $company = Company::findorFail($id);
       return view('layouts.employees',[
           'employees'=>$employees,
           'company'=>$company,
        ]);
   }

   public function show(Employee $employee, Company $companies)
   {
    return view('layouts.singleEmployee',[
        'employee'=>$employee,
        'companies'=>$companies
    ]);
   }

   public function update(Employee $employee, Request $request)
   {
       $inputs = request()->validate([
        'first_name'=>'required',
        'last_name'=>'required',
        'email'=>['required', 'email:rfc', 'unique:employees,email'],
        'phone'=>['required','unique:employees,phone'], 
       ]);
       $employee->update($inputs);
       return back();
   }

   public function destroy($id)
    {
        $employees = Employee::findorFail($id);
        $employees->delete();
        return back();
    }

        public function store($id,Employee $employee)
        {
            $company = Company::findorFail($id);
            $attributes = request()->validate([
                'first_name'=>'required',
                'last_name'=>'required',
                'email'=>['required', 'email:rfc', 'unique:employees,email'],
                'phone'=>['required','unique:employees,phone'], 
            ]);
            $attributes['company_id'] = $company->id;
            $attributes['company_name'] = $company->Name;
            $employee->create($attributes);
            return back();
        }

}
