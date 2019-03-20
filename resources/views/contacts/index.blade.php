@extends('adminlte::page')

@section('title', 'Contacts')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ mix('css/custom.css') }}">
@stop

@section('content_header')
    <h1>Contacts</h1>
@stop

@section('content')

    @include('layouts.flashes')

    <a class="btn btn-primary" href="contacts/create">New Contact</a>
    <table class="table table-hover table-responsive" id="index-table">
      <thead>
        <th>Name</th>
        <th>Email</th>
        <th>Lists</th>
      </thead>
      @foreach($contacts as $contact)
      <tr>
        <td>{{ $contact->name }}</td>
        <td>{{ $contact->email }}</td>
        <td><ul>
          @if($contact->clists()->count()!==0)
            @foreach($contact->clists as $clist)
            <li>{{ $clist->name }}</li>
            @endforeach
          @endif
        </ul></td>
        <td><a href="{{route('contacts.edit', $contact->id)}}"><button type="button" class="btn btn-primary">Edit</button></a></td>
        <td><form method="POST" action="{{ route('contacts.destroy', $contact->id) }}">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this contact?');" value="Delete">
            </form>
        </td>
      </tr>
      @endforeach
    </table>
@stop