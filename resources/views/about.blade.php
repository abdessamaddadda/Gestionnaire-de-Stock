@extends('layouts.master')
@section('main')
    <div class="container mt-5">
        <h1 class="text-center mb-4">About</h1>
        @include('includes.messages')

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header bg-danger text-white d-flex align-items-center">
                        <h5 class="mb-0">Inventory Manager</h5>
                    </div>
                    <div class="card-body">
                        <p class="lead">
                            Inventory-Manager is an open-source stock/inventory management application based on the PHP framework Laravel.
                        </p>
                        <p>Currently, Inventory-Manager supports these features to help manage your inventory:</p>
                        <ul class="list-group mb-3">
                            <li class="list-group-item">Product management</li>
                            <li class="list-group-item">Stock management</li>
                            <li class="list-group-item">Storage location management</li>
                            <li class="list-group-item">Supplier management</li>
                        </ul>
                        <p>These are some of the key features of Inventory-Manager:</p>
                        <ul class="list-group mb-3">
                            <li class="list-group-item">See which products are stored at what location</li>
                            <li class="list-group-item">Move products between locations in seconds</li>
                            <li class="list-group-item">Check stock in and out per location</li>
                            <li class="list-group-item">View which supplier supplies you what</li>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <small class="text-muted">Current version: 0.9.3</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
