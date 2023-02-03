@extends('layout')
@section('title')
Add new category
@endsection
@section('contant')

@include('inc.errors')

<form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data">
    @csrf
    
    <div class="form-group">
      
      <input type="text" class="form-control"  name="name" placeholder="name" value="{{old('name')}}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection