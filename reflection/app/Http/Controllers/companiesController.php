<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companies;


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
        $companies->delete();
        return redirect('/');
    }
   

}
