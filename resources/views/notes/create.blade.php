@extends('layout')
@section('title')
Add new Note
@endsection
@section('contant')

@include('inc.errors')

<form method="POST" action="{{route('notes.store')}}">
    @csrf
    
    <div class="form-group">
      
      <input type="text" class="form-control" rows="3" name="content" placeholder="content" value="{{old('content')}}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection