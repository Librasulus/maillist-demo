<?php

namespace App\Http\Controllers;

use App\Clist;
use App\Contact;
use Illuminate\Http\Request;

class ClistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $clists = Clist::all()->sortBy('name');
      return view('lists.index', compact('clists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lists.new');
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
        'name'=>['required', 'min:3', 'max:40']
      ]);
      
      Clist::create($attributes);
      
      session()->flash('message', 'You created a new Contact List');

      return redirect('lists');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clist  $clist
     * @return \Illuminate\Http\Response
     */
    public function show(Clist $clist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clist  $clist
     * @return \Illuminate\Http\Response
     */
    public function edit(Clist $clist)
    {
      $contacts = Contact::all()->sortBy('name');
      return view('lists.edit', compact('clist', 'contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clist  $clist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clist $clist)
    {
      $attributes=request()->validate([
        'name'=>['required', 'min:3', 'max:40'],
      ]);
      $clist->update($attributes);
      $clist->contacts()->sync( $request->contacts );
      
      session()->flash('message', 'You succesfully edited the Contact List');
      return redirect('lists');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clist  $clist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clist $clist)
    {
      $clist->delete();
      
      session()->flash('message', 'The Contact List was deleted');
      return back();
    }
}
