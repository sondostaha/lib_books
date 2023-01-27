@extends('layout')

@section('title')

Edit Book -{{$book->title}}
@endsection

@section('contant')

@include('inc.errors')

<form method="POST" action="{{route('books.update',$book->id)}}">
    @csrf
    
    <div class="form-group">
      
      <input type="text" class="form-control"  name="title" placeholder="title" value="{{old('title') ?? $book->title}}">
    </div>

    <div class="form-group">
      <textarea class="form-control" placeholder="Describtion" rows="3" name="desc">{{old('title') ?? $book->desc}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection