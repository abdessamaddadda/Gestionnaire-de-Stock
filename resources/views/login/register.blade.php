@extends('layouts.master')
@section('main')
    <div class="container w-75 my2 bg-light p-5">
        <h1>Register</h1>
        <form action="{{route('registernew')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class=" form-label">Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class=" form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-success">Register</button>
            </div>
        </form>
    </div>

@endsection