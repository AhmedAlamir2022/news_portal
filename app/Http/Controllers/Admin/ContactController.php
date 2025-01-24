<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        return view('admin.contact-page.index', compact('contact'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'address' => ['required', 'max:500'],
            'phone' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255']
        ]);
        Contact::updateOrCreate(
            ['id' => 1],
            [
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email
            ]
        );
        return redirect()->back()->with('success', 'Updated Successfully!');
    }
}
