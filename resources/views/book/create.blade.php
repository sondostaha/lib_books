@extends('layout')
@section('title')
Add new Book
@endsection
@section('contant')

@include('inc.errors')

<form method="POST" action="{{route('books.store')}}" enctype="multipart/form-data">
    @csrf
    
    <div class="form-group">
      
      <input type="text" class="form-control"  name="title" placeholder="Title" value="{{old('title')}}">
    </div>

    <div class="form-group">
      <textarea class="form-control" placeholder="Describtion" rows="3" name="desc">{{old('desc')}}</textarea>
    </div>
    <div class="mb-3">
      
      <input class="form-control" type="file" name="img">
    </div>
    Select Categories:
    @foreach ($categories as $category)

    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="category_ids[]" value="{{$category->id}}" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        {{$category->name}}
      </label>
    </div>
    @endforeach
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection