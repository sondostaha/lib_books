@extends('layout')

@section('title')

Edit category -{{$category->title}}
@endsection

@section('contant')

@include('inc.errors')

<form method="POST" action="{{route('categories.update',$category->id)}}" enctype="multipart/form-data">
    @csrf
    
    <div class="form-group">
      
      <input type="text" class="form-control"  name="name" placeholder="name" value="{{old('name') ?? $category->name}}">
    </div>

    <button type="submit" class="btn btn-primary">Edit</button>
  </form>
@endsection