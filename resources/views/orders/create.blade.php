@extends('layouts.master')
@section('main')
    @include('includes.messages')
    <div class="container w-75 my2 bg-light p-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">New Order</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('orders.store') }}" method="POST">
                        @csrf

                        <!-- Customer and Status -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="customer_id">Customer</label>
                                    <select name="customer_id" id="customer_id" class="form-control select2">
                                        <option value="" disabled selected>Select Customer</option>
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                    <p>Is the customer you're looking for not in this list? Add them <a target="_blank" href="/customers/create">here</a>.</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control select2">
                                        <option value="" disabled selected>Select Status</option>
                                        @foreach($order_statuses as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Products and Quantities -->
                        <div id="fieldlist">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="product_id[]">Product</label>
                                        <select name="product_id[]" id="product_id[]" class="form-control select2">
                                            <option value="" disabled selected>Select Product</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="quantity[]">Quantity</label>
                                        <input type="number" name="quantity[]" class="form-control" placeholder="Quantity">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Add More Products -->
                        <div class="form-group">
                            <button type="button" id="more" class="btn btn-block btn-default">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>

                        <!-- Notes -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="notes">Notes (optional)</label>
                                    <textarea name="notes" id="notes" class="form-control" style="resize: vertical" placeholder="Notes"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" style="margin-top: 20px;" class="btn btn-success pull-right">Create Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
