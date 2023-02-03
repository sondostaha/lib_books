@extends('layout')
@section('title')
All categories
@endsection

@section('contant')


@foreach ($categories as $category )
<hr>
<a href="{{route('categories.show' , $category->id)}}"><h3>{{$category->name}}</h3></a>
@auth
<a href="{{ route('categories.create') }}" class="btn btn-primary">Add</a>
<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info">Edit</a>
<a href="{{ route('categories.delete' ,$category->id) }}" class="btn btn-danger">delete</a>
@endauth
@endforeach
<hr>
{{$categories->render()}}
@endsection