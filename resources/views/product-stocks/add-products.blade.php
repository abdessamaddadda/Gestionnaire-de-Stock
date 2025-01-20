@extends('layouts.master')
@section('main')
    @include('includes.messages')
    <style>
        /* From Uiverse.io by andrew-demchenk0 */ 
.button {
  position: relative;
  margin-bottom: 10px;
  margin-top: 20px;
  width: 160px;
  height: 40px;
  cursor: pointer;
  display: flex;
  align-items: center;
  border: 1px solid #000000;
  background-color: #000000;
}

.button, .button__icon, .button__text {
  transition: all 0.3s;
}

.button .button__text {
  transform: translateX(30px);
  color: #fff;
  font-weight: 600;
}

.button .button__icon {
  position: absolute;
  transform: translateX(109px);
  height: 100%;
  width: 39px;
  background-color: #000000;
  display: flex;
  align-items: center;
  justify-content: center;
}

.button .svg {
  width: 30px;
  stroke: #fff;
}

.button:hover {
  background: #000000;
}

.button:hover .button__text {
  color: transparent;
}

.button:hover .button__icon {
  width: 148px;
  transform: translateX(0);
}

.button:active .button__icon {
  background-color: #2e8644;
}

.button:active {
  border: 1px solid #2e8644;
}
    </style>
    <div class="container w-75 my2 bg-light p-5">
    <div class="row">
        <div class="col-sm-5">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Stock</h3>
                </div>
                <div class="box-body">
                    <form action="{{ url('product-stocks/addStock') }}" method="POST">
                        @csrf

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

                        <!-- Storage Location Selection -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="storage_location_id">Storage Location</label>
                                    <select name="storage_location_id" id="storage_location_id" class="form-control select2" placeholder="Storage location">
                                        <option value="" disabled selected>Select a storage location</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->name }}</option>
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
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">

<button type="submit" class="button">
  <span class="button__text">Add Stock</span>
  <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
