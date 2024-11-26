<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\UpdateRequest;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\Contact\StorageRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::where('user_id', Auth::id())->get();

        // Renderiza la vista con los contactos.
        return Inertia::render('Contact/Index', [
            'contacts' => $contacts
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Contact/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorageRequest $request)
    {
        $data = $request->except('avatar');
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $routeName = $file->store('avatars',['disk' => 'public']);
            $data['avatar'] = $routeName;
        }
        $data['user_id'] = Auth::user()->id;

        Contact::create($data);
        return to_route('contact.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return Inertia::render('Contact/Edit', [
            'contact' => $contact
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Contact $contact)
    {
        $data = $request->except('avatar');
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $routeName = $file->store('avatars',['disk' => 'public']);
            $data['avatar'] = $routeName;

            if ($contact->avatar) {
                Storage::disk('public')->delete($contact->avatar);
            }
        }
        $contact->update($data);
        return to_route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
