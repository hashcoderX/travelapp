<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function addcontactrecord(Request $request)
    {
        $request->validate([
            'name'           => 'required',
            'email'            => 'required|email',
            'phone'                => 'required|min:9|max:12',
            'message'                  => 'required',
        ]);

        $contact = new Contact();

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;

        $contact->save();
        // return redirect()->back();
        return response()->json([
            'status' => 200,
            'message' => "Sending successfull",
        ]);

    }


    public function contactlist(){
        $contacts = Contact::all();
        return view('admin.contactList',compact('contacts'));
    }
}
