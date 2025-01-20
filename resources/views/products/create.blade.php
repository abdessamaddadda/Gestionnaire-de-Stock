@extends('layouts.master')

@section('main')

    @include('includes.messages')
<div class="container w-75 my2 bg-light p-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">New Product</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf <!-- Laravel's CSRF protection token -->

                        <!-- Product Name -->
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Product name" required>
                        </div>

                        <!-- Product Description -->
                        <div class="form-group">
                            <label for="description">Product Description</label>
                            <textarea name="description" id="description" class="form-control ck-textarea" style="resize: vertical;" placeholder="Product description" required></textarea>
                        </div>

                        <!-- Product Category -->
                        <div class="form-group">
                            <label for="product_category_id">Product Category</label>
                            <select name="product_category_id" id="product_category_id" class="form-control" required>
                                <option value="">Select a Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Supplier -->
                        <div class="form-group">
                            <label for="supplier_id">Supplier</label>
                            <select name="supplier_id" id="supplier_id" class="form-control" required>
                                <option value="">Select a Supplier</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Sales Price -->
                        <div class="form-group">
                            <label for="sales_price">Sales Price</label>
                            <input type="number" name="sales_price" id="sales_price" class="form-control" placeholder="Sales price" step="0.01" required>
                        </div>

                        <!-- Buy Price -->
                        <div class="form-group">
                            <label for="buy_price">Buy Price</label>
                            <input type="number" name="buy_price" id="buy_price" class="form-control" placeholder="Buy price" step="0.01" required>
                        </div>

                        <!-- In Stock -->
                        <div class="form-group">
                            <label for="instock">In Stock</label>
                            <input type="number" name="instock" id="instock" class="form-control" placeholder="Number of items in stock" required>
                        </div>

                        <!-- Discontinued -->
                        <div class="form-group">
                            <label for="discontinued">Discontinued</label>
                            <select name="discontinued" id="discontinued" class="form-control" required>
                                <option value="">Select Status</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>

                        <!-- Submit and Cancel Buttons -->
                        <div class="form-group text-right">
                            <button type="submit" style="margin-top: 20px;" class="btn btn-success">Submit</button>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
