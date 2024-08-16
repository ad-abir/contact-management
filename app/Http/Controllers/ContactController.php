<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        // Search functionality
        $search = $request->input('search');
    
        // Sorting functionality
        $sort_by = $request->input('sort_by', 'name');
        $sort_order = $request->input('sort_order', 'asc');
    
        // Fetch contacts based on search and sorting
        $contacts = Contact::where('name', 'like', '%' . $search . '%')
                            ->orWhere('email', 'like', '%' . $search . '%')
                            ->orderBy($sort_by, $sort_order)
                            ->get();
    
        return view('contacts.index', compact('contacts', 'search', 'sort_by', 'sort_order'));
    }
    

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:contacts',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);
    
        // Create a new contact
        Contact::create($validatedData);
    
        // Redirect to the contacts list with a success message
        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
    }
    

    public function show($id)
    {
        // Find the contact by ID
        $contact = Contact::findOrFail($id);
    
        return view('contacts.show', compact('contact'));
    }
    

    public function edit($id)
    {
        // Find the contact by ID
        $contact = Contact::findOrFail($id);
    
        return view('contacts.edit', compact('contact'));
    }
    
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:contacts,email,' . $id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);
    
        // Find the contact by ID and update its details
        $contact = Contact::findOrFail($id);
        $contact->update($validatedData);
    
        // Redirect to the contacts list with a success message
        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }
    

    public function destroy($id)
    {
        // Find the contact by ID and delete it
        $contact = Contact::findOrFail($id);
        $contact->delete();
    
        // Redirect to the contacts list with a success message
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
    
}

