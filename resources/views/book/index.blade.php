@extends('layout')

@section('title')
All Books
@endsection

@section('contant')


@auth
<h3>Notes:</h3>
    @foreach (Auth::user()->notes as $note )

    <p>{{$note->content}}</p>

    @endforeach 
@endauth
<a href="{{route('notes.create')}}">Add Note</a>


@foreach ($books as $book )
<hr>
<a href="{{route('books.show' , $book->id)}}"><h3>{{$book->title}}</h3></a>


<p>{{$book->desc}}</p>
<img src="{{$book->img}}" class="card-img-top">
@auth
<a href="{{ route('books.create') }}" class="btn btn-primary">Add</a>
<a href="{{ route('books.edit', $book->id) }}" class="btn btn-info">Edit</a>
@if(Auth::user()->is_admin ==1 )
<a href="{{ route('books.delete' ,$book->id) }}" class="btn btn-danger">delete</a>
@endif
@endauth
@method('DELETE')
@endforeach
<hr>
{{$books->render()}}
@endsection