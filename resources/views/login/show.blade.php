@extends('layouts.master')
@section('main')
@include('includes.messages')
    <div class="container w-75 my2 bg-light p-5">
        <h1>Login</h1>
        <form action="{{route('login')}}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="" class=" form-label">Email</label>
                <input type="email" name="email" class="form-control">
                @error('record')
                <span class="text danger">{{$message}}</span>
            @enderror
            </div>
            <div class="mb-3">
                <label for="" class=" form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-success">Login</button>
            </div>
            <div class="text-center">
                <p>Not a member? <a href="/register">Register</a></p>
            </div>
        </form>
    </div>

@endsection