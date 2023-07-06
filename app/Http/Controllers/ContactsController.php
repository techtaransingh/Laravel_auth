<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
    public function view(Request $request){
        
        return view('contacts');
    }
    public function submit(Request $request){
            $request->validate([
                'name'=>'required|min:5',
                'email'=>'required|email',
                'address'=>'required' ,
                'mob_no'=> 'required',
                'image'=> 'required'
            ]);
           
            $image = time().'.'.$request->file('image')->extension();

    $request->file('image')->move(public_path('images'),$image);

    $contact = Contact::create($_REQUEST);
    if($contact){
        $contact->image = $image;
        $contact->created_by = auth()->user()->id;
        $contact->save();
        $request->session()->flash('success','data upload hogya');
    }
    else{
        $request->session()->flash('error','something went wrong');
    }
    
        return back(); 
    }
}
