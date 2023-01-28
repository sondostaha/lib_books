@extends('layout')
@section('title')
All Books
@endsection

@section('contant')
<h1>welcome to our store of  books</h1>

@foreach ($books as $book )
<hr>
<a href="{{route('books.show' , $book->id)}}"><h3>{{$book->title}}</h3></a>


<p>{{$book->desc}}</p>
<img src="{{$book->img}}" class="card-img-top">

<a href="{{ route('books.create') }}" class="btn btn-primary">Add</a>
<a href="{{ route('books.edit', $book->id) }}" class="btn btn-info">Edit</a>
<a href="{{ route('books.delete' ,$book->id) }}" class="btn btn-danger">delete</a>
@method('DELETE')
@endforeach
<hr>
{{$books->render()}}
@endsection