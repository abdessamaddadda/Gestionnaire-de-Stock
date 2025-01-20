@extends('layouts.master')
@section('main')
    @include('includes.messages')

    <form action="{{ url('product-stocks/moveStock') }}"  class="container w-75 my2 bg-light p-5" method="POST">
        @csrf

        <div class="row">
            <!-- Source Storage Location -->
            <div class="col-sm-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Source</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="storage_location_id_source">Storage location</label>
                                    <select name="storage_location_id_source" id="storage_location_id_source" class="form-control select2" placeholder="Storage location">
                                        <option value="" disabled selected>Select a storage location</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Destination Storage Location -->
            <div class="col-sm-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Destination</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="storage_location_id_destination">Storage location</label>
                                    <select name="storage_location_id_destination" id="storage_location_id_destination" class="form-control select2" placeholder="Storage location">
                                        <option value="" disabled selected>Select a storage location</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Product Information</h3>
                    </div>
                    <div class="box-body">
                        <!-- Product Selection -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="product_id">Product</label>
                                    <select name="product_id" id="product_id" class="form-control select2" placeholder="Product">
                                        <option value="" disabled selected>Select a product</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Quantity Input -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Quantity">
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group">
                            <button type="submit" style="margin-top: 20px;" class="btn btn-success pull-right">Move Products</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
