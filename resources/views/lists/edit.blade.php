@extends('adminlte::page')

@section('title', 'Contact Lists')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ mix('css/custom.css') }}">
@stop

@section('content_header')
    <h1>Edit Contact List</h1>
    <br/>
    <form id="edit-form" class="form-horizontal" method="POST" action="{{route('lists.update', $clist->id)}}">
          {{ csrf_field() }}
          {{ method_field('patch') }}

          <label class="" for="name">Name</label>
          <input type="text" name="name" class="form-control" id="input-name" value="{{ $clist->name }}">
            
          <table class="table table-hover table-responsive" id="index-table">
            <thead>
              <th>Name</th>
              <th>Email</th>
              <th>Assigned</th>
            </thead>
            @foreach($contacts as $contact)
            <tr>
              <td>{{ $contact->name }}</td>
              <td>{{ $contact->email }}</td>
              <td>
                <input type="checkbox" value="{{ $contact->id }}" name="contacts[]" {{ $clist->contacts->contains($contact->id)?'checked':'' }}>
              </td>
            </tr>
            @endforeach
          </table>
          
          <input type="submit" class="btn btn-primary" value="Save">
          <input type="submit" class="btn btn-primary" formaction="{{route('lists.index')}}" formmethod="get" value="Back">
      </form>
    
@include('layouts.errors')
    
@stop

@section('content')

@stop