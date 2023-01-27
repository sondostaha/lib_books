@extends('layout')
@section('title')

BOOK {{$books->id}}
@endsection
@section('contant')
<h3>Book Id {{$books->id}}</h3>
<h4>{{$books->title}}</h4>
<p>{{$books->desc}}</p>

<a href="{{route('books.index')}}">Back</a>

@endsection