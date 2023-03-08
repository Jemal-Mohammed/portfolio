<?php

namespace App\Http\Controllers;

use App\Models\Supervisor;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function createCompanies(){
        $supervisors=Supervisor::all();
        return view('backend.companies.createComapnies',compact('supervisors'));
    }
    public function index(){
        $companies=Company::all();
        return view('backend.companies.allCompanies',compact('companies'));
    }

    public function deleteCompany($id){
       
        $company=Company::find($id);

        if($company->delete()){
            return back()->with(['warning'=>'you have deleted successfully']);
        }
        return back()->with(['error'=>'Something went wrong']);


    }



  public function addCompanies(Request $request){
      $request->validate([
          'companyName'=>'required',
          'title'=>'required',
          'sup_id'=>'required',
          'address'=>'required',
          'city'=>'required',

      ]);
    $company=new company();


    $company->title=$request->title;
    $company->sup_id=$request->sup_id;
    $company->address=$request->address;
    $company->city=$request->city;
    $company->companyName=$request->companyName;

if($company->save()){
    return back()->with('message','you have added company successfully');
}
return back()->with('error','Something went wrong');

  }
}
