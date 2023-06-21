<?php

namespace App\Http\Controllers;

use App\Models\Kullanici;
use App\Models\Company;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $users=Kullanici::with('company')->orderBy('id','desc')->paginate(5);
        return view('users.index',compact('users'));
    }
    public function create()
    {
        $companies=Company::all();
        return view('users.create', compact('companies'));
    }
    //to store new companies
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'email'=>'required',
            'address'=>'required',
            'company_id'=>'required',
        ]);
        $selectedCompanyId=$request->input('company_id');
        $user = new Kullanici();
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->address=$request->input('address');
        $user->company_id=$selectedCompanyId;
        $user->save();
        Alert::success('Created Successfully');

        return redirect()->route('users.index')->with('success','user created successfully');
    }

    public function show(Kullanici $user)
    {
        return view('users.show',compact('user'));
    }

    public function edit(Kullanici $user)
    {
        $companies=Company::all();
        return view('users.edit',compact('user','companies'));
    }

    public function update(Request $request,Kullanici $user)
    {
        Alert::success('Updated Successfully');
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'company_id'=>'required',
        ]);
        $user->fill($request->post())->save();
        return redirect()->route('users.index')->with('success','user updated successfully');
    }
    public function destroy(Kullanici $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    

    }
}
