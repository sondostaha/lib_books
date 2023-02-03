@extends('layout')
@section('title')
Register
@endsection

@section('contant')

@include('inc.errors')
<div class="containr my-5">
  <form method="POST" action="{{route('auth.handleRegister')}}">
      @csrf
      
      <div class="form-group">
        
        <input type="text" class="form-control"  name="name" placeholder="name" value="{{old('name')}}">
      </div>

      <div class="form-group">
        
          <input type="email" class="form-control"  name="email" placeholder="email" value="{{old('email')}}">
        </div>

        <div class="form-group">
        
          <input type="password" class="form-control"  name="password" placeholder="password" value="{{old('password')}}">
        </div>

      <button type="submit" class="btn btn-primary">Register</button>
  </form>
</div>
@endsection