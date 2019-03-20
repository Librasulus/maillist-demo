@extends('adminlte::page')

@section('title', 'Mails')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ mix('css/custom.css') }}">
@stop

@section('content_header')
    <h1>Mails</h1>
@stop

@section('content')

    @include('layouts.flashes')

    <a class="btn btn-primary" href="mails/create">New Mail</a>
    <table class="table table-hover table-responsive" id="index-table">
      <thead>
        <th>Name</th>
        <th>List</th>
      </thead>
      @foreach($mails as $mail)
      <tr>
        <td>{{ $mail->name }}</td>
        <td>
          @if($mail->clist)
            {{ $mail->clist->name }}
          @endif
        </td>
        <td><a href="{{route('mails.edit', $mail->id)}}"><button type="button" class="btn btn-primary">Edit</button></a></td>
        <td><form method="POST" action="{{ route('mails.destroy', $mail->id) }}">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Mail?');" value="Delete">
            </form>
        </td>
      </tr>
    </form>
      @endforeach
    </table>
@stop