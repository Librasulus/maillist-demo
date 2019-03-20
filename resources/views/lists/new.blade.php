@extends('adminlte::page')

@section('title', 'Contact Lists')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ mix('css/custom.css') }}">
@stop

@section('content_header')
    <h1>Create a new Contact List</h1>
    <br/>
    <form id="edit-form" class="form-horizontal" method="POST" action="{{route('lists.store')}}">
          {{ csrf_field() }}

          <label class="" for="name">Name</label>
          <input type="text" name="name" class="form-control" id="input-name" value="" autofocus>
            
          <input type="submit" class="btn btn-primary" value="Save">
          <input type="submit" class="btn btn-primary" formaction="{{route('lists.index')}}" formmethod="get" value="Back">
    </form>
    
@include('layouts.errors')
    
@stop

@section('content')

@stop