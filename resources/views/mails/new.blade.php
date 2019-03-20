@extends('adminlte::page')

@section('title', 'Mails')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ mix('css/custom.css') }}">
<script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
@stop

@section('content_header')
    <h1>Create a new Mail</h1>
    <br/>
    <form id="edit-form" class="form-horizontal" method="POST" action="{{route('mails.store')}}">
          {{ csrf_field() }}

          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" id="input-name" value="">
          
          <label for="subject">Subject</label>
          <input type="text" name="subject" class="form-control" id="subject" value="">
            
          <label for="body">Body</label>
          <textarea name="body" class="form-control" id="editor" value=""></textarea>
          
          <div>
            Lists:
            @foreach($clists as $clist)
            <label for="{{ $clist->name }}"><input id="{{ $clist->name }}" type="radio" value="{{ $clist->id }}" name="clist_id">{{ $clist->name }}</label>
            @endforeach
          </div>
            
          <input type="submit" class="btn btn-primary" value="Save">
          <input type="submit" class="btn btn-primary" formaction="{{route('mails.index')}}" formmethod="get" value="Back">
    </form>
    
@include('layouts.errors')
    
@stop

@section('content')
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@stop