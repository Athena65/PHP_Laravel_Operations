<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;



class CompanyController extends Controller
{
    public function index()
    { 

        $companies=Company::orderBy('id','desc')->paginate(5);
        return view('companies.index',compact('companies'));
    }
    public function create()
    {
        return view('companies.create');
    }
    //to store new companies
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'address'=>'required'

        ]);
        Alert::success('Created Successfully');
        Company::create($request->post());
        return redirect()->route('companies.index')->with('success','company created successfully');
    }

    public function show(Company $company)
    {
        return view('companies.show',compact('company'));
    }

    public function edit(Company $company)
    {
        return view('companies.edit',compact('company'));
    }

    public function update(Request $request,Company $company)
    {
        Alert::success('Updated Successfully');
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'address'=>'required'
        ]);
        $company->fill($request->post())->save();
        return redirect()->route('companies.index')->with('success','company updated successfully');
    }
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index');
    

    }

}
