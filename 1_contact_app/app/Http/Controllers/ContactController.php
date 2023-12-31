<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Company;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Contact::query();

        if(request()->query('trash')) {
            $contacts = auth()->user()->contacts()->onlyTrashed();
        }
        $contacts = auth()->user()->contacts()->filterData(); // Scope para o filtro dos contatos
        $companies = Company::all();
        return view('contacts.index', compact('contacts', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        $contact = new Contact;
        return view('contacts.create', compact('companies', 'contact'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        $request->user()->contacts()->create($request->all());
        return redirect()->route('contacts.index')->with('message', 'Contact has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        $companies = Company::all();
        return view('contacts.edit', compact('contact', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        $contact->update($request->all());
        return redirect()->route('contacts.index')->with('message', 'Contact has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        $redirect = request()->query('redirect') ? redirect()->route('contacts.index') : back();
        return      ($redirect)
                        ->with('message', 'Contact has been moved to trash') 
                        ->with('undo', $this->getUndo('contacts.restore', $contact)); 
    }

    public function restore(Contact $contact)
    {
        $contact->restore();
        return back()
                    ->with('message', 'Contact has been restored from trash')
                    ->with('undo', $this->getUndo('contacts.destroy', $contact)); 
    }

    private function getUndo($name, $resources)
    {
        return request()->missing('undo') ? route($name, [$resources->id, 'undo' => true]) : null;
    }

    public function forceDelete(Contact $contact)
    {
        $contact->forceDelete();
        return back()->with('message', 'Contact has been deleted permanently'); 
    }
}
