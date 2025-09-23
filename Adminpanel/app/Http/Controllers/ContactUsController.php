<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(){

        $contacts = ContactUs::all();
        return view('contact.index', compact('contacts'));
    }

    public function show(ContactUs $contact){
        return view('contact.show', compact('contact'));

    }
    public function destroy(ContactUs $contact){

        $contact->delete();

       return redirect()->route('contact.index')->with('success','با موفقیت حذف گردید');
    }
}
