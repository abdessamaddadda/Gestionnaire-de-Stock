@extends('layouts.master')
@section('main')
    @include('includes.messages')
    <style>
        /* From Uiverse.io by cssbuttons-io */ 
button {
 width: 160px;
 height: 50px;
 margin-top: 20px;
 cursor: pointer;
 display: flex;
 align-items: center;
 background: red;
 border: none;
 border-radius: 5px;
 box-shadow: 1px 1px 3px rgba(0,0,0,0.15);
 background: #e62222;
}

button, button span {
 transition: 200ms;
}

button .text {
 transform: translateX(35px);
 color: white;
 font-weight: bold;
}

button .icon {
 position: absolute;
 border-left: 1px solid #c41b1b;
 transform: translateX(110px);
 height: 40px;
 width: 40px;
 display: flex;
 align-items: center;
 justify-content: center;
}

button svg {
 width: 15px;
 fill: #eee;
}

button:hover {
 background: #ff3636;
}

button:hover .text {
 color: transparent;
}

button:hover .icon {
 width: 150px;
 border-left: none;
 transform: translateX(0);
}

button:focus {
 outline: none;
}

button:active .icon svg {
 transform: scale(0.8);
}
    </style>
    <form action="{{ url('product-stocks/removeStock') }}"  class="container w-75 my2 bg-light p-5" method="POST">
        @csrf

        <div class="row">
            <div class="col-sm-5">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Remove stock</h3>
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

                        <!-- Storage Location Selection -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="storage_location_id">Storage location</label>
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
                        <div class="form-group">
                            <button class="noselect" type="submit">
                                <span class="text">Delete</span>
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
