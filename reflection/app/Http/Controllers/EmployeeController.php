<?php

Namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;

class EmployeeController extends Controller
{
    public function index(Company $company)
    {
        $employees = $company->employees()->paginate(10);
        return view('layouts.employees',[
            'employees'=>$employees,
            'company'=>$company,
        ]);
    }

    public function show(Employee $employee, Company $company)
    {
        return view('layouts.singleEmployee',[
            'employee'=>$employee,
            'companies'=>$company
        ]);
    }

    public function update(Employee $employee, Request $request)
    {
        $inputs = $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>['required', 'email:rfc'],
            'phone'=>['required'], 
        ]);
        $employee->update($inputs);
        return back();
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return back();
    }

    public function store(Company $company,Request $request)
    {
        $attributes = $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>['required', 'email:rfc', 'unique:employees,email'],
            'phone'=>['required','unique:employees,phone'], 
        ]);
        $attributes['company_id'] = $company->id;
        $attributes['company_name'] = $company->name;
        Employee::create($attributes);
        return back();
    }

}
