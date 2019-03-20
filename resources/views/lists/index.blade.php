@extends('adminlte::page')

@section('title', 'Contacts')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ mix('css/custom.css') }}">
@stop

@section('content_header')
    <h1>Contact Lists</h1>
@stop

@section('content')

    @include('layouts.flashes')

    <a class="btn btn-primary" href="lists/create">New List</a>
    <table class="table table-hover table-responsive" id="index-table">
      <thead>
        <th>Name</th>
        <th>Contacts</th>
      </thead>
      @foreach($clists as $clist)
      <tr>
        <td>{{ $clist->name }}</td>
        <td>{{ $clist->contacts()->count() }}</td>
        <td><a href="{{route('lists.edit', $clist->id)}}"><button type="button" class="btn btn-primary">Edit</button></a></td>
        <td><form method="POST" action="{{ route('lists.destroy', $clist->id) }}">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this list?');" value="Delete">
            </form>
        </td>
      </tr>
    </form>
      @endforeach
    </table>
@stop