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
                'email'=>'required|email|unique:contacts',
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
    public function list(Request $request){
        $contacts = Contact::all();
        return view('list',['contacts'=> $contacts]);
    }
    public function delete(Request $request,$id){
        $contact= Contact::find($id);
        $contactDeleted = $contact->delete();
    
        if($contactDeleted){
            $request->session()->flash('success','entry '.$id.' deleted');
        }
        else{
            $request->session()->flash('error','something went wrong');
        }
        
            return back(); 
    }
    public function edit(Request $request,$id){
        $contact = Contact::find($id);
       
        return view('edit',['contact'=>$contact]);
      }
      public function editContact(Request $request,$id){
        
        $request->validate([
            'name'=>'required|min:5',
                'address'=>'required' ,
                'mob_no'=> 'required',
                // 'image'=> 'required',
                'image_value'=> 'required',
        ]);
        
        $contactEdited = Contact::find($id);
        $contactEdited->name= $request->name;
        $contactEdited->email= $request->email;
        $contactEdited->address= $request->address;
        $contactEdited->mob_no= $request->mob_no;
        $image = time().'.'.$request->file('image')->extension();

    $request->file('image')->move(public_path('images'),$image);
        $contactEdited->image= $request->image;

        if($contactEdited->save()){
            $request->session()->flash('success','data edit hogya');
        }
        else{
            $request->session()->flash('error','something went wrong');
        }
        
            return redirect('/contacts/list');  
    }


 
}
