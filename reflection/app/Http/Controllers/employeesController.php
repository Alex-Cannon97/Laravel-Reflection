<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;
use App\Models\companies;

class employeesController extends Controller
{
    public function show($id)
   {
       $employees =employees::where('foreign_id', $id)->paginate(10);
       $company = companies::find($id);
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

    // public function create(Request $request)
    // {
    //     $rules = [
    //         'First-Name'=> 'required|string|min:2|max:20',
    //         'Last-Name'=> 'required|string|min:2|max:20',
    //         'Employee-Email'=> 'required|string|min:2|max:20',
    //         'Employee-Phone'=> 'required|integer|min:11|max:11'
    //     ];
    //     $data = $request->input();
    //     dd($data);
    //     try{
    //         $employee = new employees;
    //         $employee->FirstName = $data['First-Name'];
    //         $employee->LastName = $data['Last-Name'];
    //         $employee->EmployeeEmail = $data['Employee-Email'];
    //         $employee->EmployeePhone = $data['Employee-Phone'];
    //         $employee->save();
    //         return back();
    //     }catch(Exception $e){
    //         return back();
    //     }
    // }
        public function store($id,employees $employee)
        {
            $company = companies::find($id);
            $attributes = request()->validate([
                'First-Name'=>'required',
                'Last-Name'=>'required',
                'Employee-Email'=>'required',
                'Employee-Phone'=>'required',
            ]);
            $employee->addEmployees($id, $attributes['First-Name'], $attributes['Last-Name'],$company['Name'], $attributes['Employee-Email'], $attributes['Employee-Phone']);
            return back();
        }

    // public function store(Request $request)
    // {
    //     dd($request);
    //     $request->validate([
    //         'First-Name'=>'required',
    //         'Last-Name'=>'required',
    //         'Employee-Email'=>'required',
    //         'Employee-Phone'=>'required',
    //     ]);
    //     dd($request);
    //     employees::create($request->all());
    //     return redirect('/');
    // }
}
