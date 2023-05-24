<?php

namespace App\Http\Controllers;

use App\Interfaces\Repositories\ContactInterface as ContactRepositoryInterface;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    private ContactRepositoryInterface $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = $this->contactRepository->getAllContacts();

        return view('contacts.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:6'],	
            'email' => ['required', 'string', 'email', 'max:255', 'unique:contacts'],
            'contact' => ['required', 'string', 'min:9', 'max:9', 'unique:contacts'],
        ]);

        $contact = $this->contactRepository->create($request->all());

        if($contact) {
            return redirect()->route('contacts.index')->with('success', 'Contact created successfully');
        }

        return redirect()->route('contacts.index')->with('error', 'Something went wrong');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        if ($contact) {
            return view('contacts.show',compact('contact'));
        }
        return redirect()->route('contacts.index')->with('error', 'Something went wrong, invalid user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255','min:6'],	
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('contacts')->ignore($contact->id),],
            'contact' => ['required', 'string', 'min:9', 'max:9', Rule::unique('contacts')->ignore($contact->id),],
        ]);

        $updatedContact = $this->contactRepository->update($contact,$request->all());

        if($updatedContact) {
            return redirect()->route('contacts.index')->with('success', 'Contact updated successfully');
        }

        return redirect()->route('contacts.index')->with('error', 'Something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $deletedContact = $this->contactRepository->delete($contact);

        if($deletedContact) {
            return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully');
        }

        return redirect()->route('contacts.index')->with('error', 'Something went wrong');
    }
}
