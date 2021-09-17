<?php

Namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
	public function index()
	{
		$companies=Company::paginate(10);
		return view('dashboard', ['companies' => $companies]);
	}

	public function show(Company $company){
		return view('layouts.company',[
		'companies' => $company,
		]);
	}

	public function destroy(Company $company)
	{
		
		$images = $company->logo;
		unlink("storage/images/".$images);
		$company->delete();
		return redirect('/');
	}

	public function store(Company $company, request $request)
	{
		$attributes = $request->validate([
			'name'=>['sometimes','required','unique:companies,name'],
			'email'=>['sometimes','required','email:rfc','unique:companies,email'],
			'logo'=>['required', 'mimes:jpg,bmp,png'],
			'website'=>'required',
		]);
		$attributes['logo'] = str_replace('public/images/', '',$request->file('logo')->store('public/images'));
		$company->create($attributes);
		return back();
	}

	public function update(Company $company, Request $request)
	{
		$attributes = $request->validate([
			'name'=>['required','unique:companies,name'],
			'email'=>['required','email:rfc'],
			'website'=>['required'],
		]);
		$company->update($attributes);
		return back();
	}

}
