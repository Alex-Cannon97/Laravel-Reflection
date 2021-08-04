<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class CompanyController extends Controller
{
  public function index()
   {
       $companies=Company::paginate(10);
       return view('dashboard',['companies'=>$companies]);
   }

   public function show(Company $companies){
     return view('layouts.company',[
       'companies' => $companies,
     ]);
   }

   public function destroy($id)
    {
        $companies = Company::findorFail($id);
        $images = $companies->logo;
        unlink("storage/images/".$images);
        $companies->delete();
        return redirect('/');
    }
   
  public function Store(Company $company, Request $request)
  {
    $attributes = request()->validate([
      'Name'=>['required','unique:companies,Name'],
      'email'=>['required','email:rfc','unique:companies,email'],
      'logo'=>['required', 'mimes:jpg,bmp,png'],
      'website'=>'required',
    ]);
      $attributes['logo'] = str_replace('public/images/', '',$request->file('logo')->store('public/images'));
      $company->create($attributes);
    return back();
  }

  public function update($id, Request $request)
  {
    $company = Company::findorFail($id);
    $attributes = request()->validate([
      'Name'=>['required','unique:companies,Name'],
      'email'=>['required','email:rfc','unique:companies,email'],
      
      'website'=>['required','unique:companies,website'],
    ]);
      $company->update($attributes);
    return back();
  }

}
