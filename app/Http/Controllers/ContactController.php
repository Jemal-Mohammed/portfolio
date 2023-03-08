<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(Request $request){

        $contact=new Contact();
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'message'=>'required']);

           $contact->name=$request->name;
           $contact->email=$request->email;
           $contact->message=$request->message;
$contact->role = session('user')->role;
$contact->user_id = session('user')->id;
           $contact->save();
           return back()->with('message','successfully sent');

    }
   public function contactFeedBack(){
    $contacts = Contact::latest()->get();
    return view('backend.adminContactList', compact('contacts'));
   }
}
