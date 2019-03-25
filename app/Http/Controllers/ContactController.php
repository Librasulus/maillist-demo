<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Clist;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::sortable()->paginate(10);
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $clists = Clist::all();
      return view('contacts.new', compact('clists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $attributes=request()->validate([
        'name'=>['required', 'min:3', 'max:40'],
        'email'=>['required', 'email']
      ]);
      
      $contact=Contact::create($attributes);
      $contact->clists()->sync( $request->clists );
      
      session()->flash('message', 'You created a new Contact');

      return redirect('contacts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
      $clists = Clist::all();

      return view('contacts.edit', compact('contact', 'clists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
      $attributes=request()->validate([
        'name'=>['required', 'min:3', 'max:40'],
        'email'=>['required', 'email']
      ]);
      $contact->update($attributes);
      $contact->clists()->sync( $request->clists );
      session()->flash('message', 'You succesfully edited the Contact');
      
      return redirect('contacts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        
        session()->flash('message', 'The Contact was deleted');
        return back();
    }
}
