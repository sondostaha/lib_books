@extends('layout')
@section('title')
LogIn
@endsection

@section('contant')

@include('inc.errors')
<div class="containr my-5">
  <form method="POST" action="{{route('auth.handleLogin')}}">
      @csrf
      
      <div class="form-group">
        
          <input type="email" class="form-control"  name="email" placeholder="email" value="{{old('email')}}">
        </div>

        <div class="form-group">
        
          <input type="password" class="form-control"  name="password" placeholder="password" value="{{old('password')}}">
        </div>

      <button type="submit" class="btn btn-primary">Register</button>
      <a href="{{route('auth.github.redirect')}}" type="submit" class="btn btn-success">Sign with github</a>
  </form>
</div>
@endsection