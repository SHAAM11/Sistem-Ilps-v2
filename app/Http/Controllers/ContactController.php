<?php

namespace App\Http\Controllers;
use App\Models\contact;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view("contact.create");
    }

    public  function show(){
         $contact = contact::all();
        return view("contact.list" ,compact("contact"));

    }

    public function create()
    {
        return view("contact.create");
    }
    public function store(Request $request)
    {
        $contact = new contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();
        return view('contact.create');

    }

    // Edit Data
    public function edit($id){
        $contact = contact::findOrFail($id);
        return view('contact.edit', compact('contact'));
    }

    // Update Data
    public function update(Request $request, $id){
        $contact = contact::findOrFail($id);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->route('contact.list') ->with ('success1','Update succesfully');
    }

    public function destroy($id){
        contact::destroy($id);
        return redirect()->route('contact.list')->with ('danger','Delete succesfully');
    }
    


}

