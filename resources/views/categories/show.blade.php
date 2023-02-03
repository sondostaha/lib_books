@extends('layout')
@section('title')

Category: {{$category->id}}
@endsection
@section('contant')
<h3>category ID {{$category->id}}</h3>
<h4>{{$category->name}}</h4>

<h3>books :</h3>
    <ul>
        @foreach ($category->books as $book)

    <li>{{$book->title}}</li>
    <li>{{$book->desc}}</li>
    
@endforeach
</ul>
<hr>
<a href="{{route('categories.index')}}">Back</a>

@endsection