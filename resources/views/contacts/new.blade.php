@extends('adminlte::page')

@section('title', 'Contacts')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ mix('css/custom.css') }}">
@stop

@section('content_header')
    <h1>Create a new Contact</h1>
    <br/>
    <form id="edit-form" class="form-horizontal" method="POST" action="{{route('contacts.store')}}">
          {{ csrf_field() }}

          <label class="" for="name">Name</label>
          <input type="text" name="name" class="form-control" id="input-name" value="" autofocus>
            
          <label class="col-form-label" for="email">E-mail</label>
          <input type="text" name="email" class="form-control" id="input-email" value="" autofocus>
          <div>
            Lists:
            @foreach($clists as $clist)
            <label for="{{ $clist->name }}"><input id="{{ $clist->name }}" type="checkbox" value="{{ $clist->id }}" name="clists[]">{{ $clist->name }}</label>
            @endforeach
          </div>
          <input type="submit" class="btn btn-primary" value="Save">
          <input type="submit" class="btn btn-primary" formaction="{{route('contacts.index')}}" formmethod="get" value="Back">
    </form>
    
@include('layouts.errors')
    
@stop

@section('content')

@stop