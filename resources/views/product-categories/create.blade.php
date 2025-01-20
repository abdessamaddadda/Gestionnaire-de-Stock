@extends('layouts.master')
@section('main')
    @include('includes.messages')
    <div class="container w-75 my2 bg-light p-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">New Product Category</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('product-categories.store') }}" method="POST">
                        @csrf

                        <!-- Product Category Name -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Product Category Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Product category name" required>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group text-right">
                            <button type="submit" style="margin-top: 20px;" class="btn btn-success">Create Product Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
