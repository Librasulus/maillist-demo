<?php

namespace App\Http\Controllers;

use App\Mail;
use App\Clist;
use Illuminate\Http\Request;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $mails = Mail::all();
         return view('mails.index', compact('mails'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $clists = Clist::all();
      return view('mails.new', compact('clists'));
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
        'subject'=>['required', 'min:3', 'max:40'],
        'body'=>['required', 'min:3'],
        'clist_id'=>['integer']
      ]);
      $contact=Mail::create($attributes);
      
      // $clist = Clist::find($request->clist);
      // $mail->clist()->associate($clist)->save();
      
      session()->flash('message', 'You created a new Mail');

      return redirect('mails');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function show(Mail $mail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function edit(Mail $mail)
    {
      $clists = Clist::all();

      return view('mails.edit', compact('mail', 'clists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mail $mail)
    {
      $attributes=request()->validate([
        'name'=>['required', 'min:3', 'max:40'],
        'subject'=>['required', 'min:3', 'max:40'],
        'body'=>['required', 'min:3'],
        'clist_id'=>['integer']
      ]);
      $mail->update($attributes);
      
       //$clist = Clist::find($request->clist_id);
       //dd($request);
       // $mail->clist()->associate($clist);
      
      session()->flash('message', 'You edited a Mail');

      return redirect('mails');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mail $mail)
    {
      $mail->delete();
      
      session()->flash('message', 'The Mail has been deleted');
      return back();
    }
}
