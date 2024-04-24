<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Contact;
use App\Models\Contactus;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use App\Http\Controllers\Controller;

class ContactControler extends Controller
{

    public function showForm()
    {
        return view('admin.contact.index');
    }

    public function showContactUsView()
{

    $submissions = Contact::all();


    return view('admin.contact.index', ['submissions' => $submissions]);
}
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            // 'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:300',
        ]);

        // Store the contact form data in the database
        Contact::create($request->all());

        return redirect()->back()->with('message', 'Your message has been sent successfully!');
    }

    public function showAdmin()
    {
        // Retrieve all contact form submissions
        // $contacts = Contact::all();
        // return view('admin.contact.index', compact('contacts'));


        $contacts = Contact::all();
        return view('admin.contact.index')->with('contacts', $contacts);
    }









}
