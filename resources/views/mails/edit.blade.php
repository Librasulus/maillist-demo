@extends('adminlte::page')

@section('title', 'Mails')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ mix('css/custom.css') }}">
<script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
@stop

@section('content_header')
    <h1>Edit Mail</h1>
    <br/>
    
    
@include('layouts.errors')
    
@stop

@section('content')

<form id="edit-form" class="form-horizontal" method="POST" action="{{route('mails.update', $mail->id)}}">
      {{ csrf_field() }}
      {{ method_field('patch') }}

      <label for="name">Name</label>
      <input type="text" name="name" class="form-control" id="input-name" value="{{ $mail->name }}">
      
      <label for="subject">Subject</label>
      <input type="text" name="subject" class="form-control" id="subject" value="{{ $mail->subject }}">
        
      <label for="body">Body</label>
      <textarea name="body" class="form-control" id="editor">{{ $mail->body }}</textarea>
      <br/>
      <div>
        Lists:
        @foreach($clists as $clist)
        <label for="{{ $clist->name }}"><input id="{{ $clist->name }}" type="radio" value="{{ $clist->id }}" name="clist_id" {{ count($mail->clist)&&$mail->clist->id==$clist->id?'checked':'' }}>{{ $clist->name }}</label>
        @endforeach
      </div>
        
      <input type="submit" class="btn btn-primary" value="Save">
      <input type="submit" class="btn btn-primary" formaction="{{route('mails.index')}}" formmethod="get" value="Back">
</form>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@stop