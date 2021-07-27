<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companies;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class companiesController extends Controller
{
  public function index()
   {
       $companies=companies::paginate(10);
       return view('dashboard',['companies'=>$companies]);
   }

   public function show(companies $companies){
     return view('layouts.company',[
       'companies' => $companies,
     ]);
   }

   public function delete($id)
    {
        $companies = companies::find($id);
        $images = $companies->logo;
        unlink("storage/images/".$images);
        $companies->delete();
        return redirect('/');
    }
   
  public function storeCompany(companies $company, Request $request)
  {
    $attributes = request()->validate([
      'company-name'=>'required',
      'company-email'=>'required',
      'company-logo'=>'required',
      'company-website'=>'required',
    ]);
      $logo = $request->file('company-logo');
      $extension = $logo->getClientOriginalExtension();
      Storage::disk('public')->put($logo->getFilename().'.'.$extension, File::get($logo));

    $company->addCompany($attributes['company-name'], $attributes['company-email'], $logo->getFilename().'.'.$extension, $attributes['company-website']);
    return back();
  }

  public function update($id, Request $request)
  {
    $company = companies::find($id);
    $attributes = request()->validate([
      'Name'=>'required',
      'email'=>'required',
      
      'website'=>'required',
    ]);
    $company->update($attributes);
    return back();
  }

}
