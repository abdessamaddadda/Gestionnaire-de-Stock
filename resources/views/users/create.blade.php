@extends('layouts.master')
@section('main')
    @include('includes.messages')
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">New user</h3>
                </div>
                <div class="box-body">
                    <form action="{{ url('users') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email address">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                        </div>

                        <button type="submit" style="margin-top: 20px;" class="pull-right btn btn-success">Create user</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
