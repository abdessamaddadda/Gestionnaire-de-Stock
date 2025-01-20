@extends('layouts.master')
@section('main')
    @include('includes.messages')

    <style>
		/* From Uiverse.io by vinodjangid07 */ 
.Btn {
  position: relative;
  display: flex;
  margin-top: 20px;
  align-items: center;
  justify-content: flex-start;
  width: 100px;
  height: 40px;
  border: none;
  padding: 0px 20px;
  background-color: rgb(0, 0, 0);
  color: white;
  font-weight: 500;
  cursor: pointer;
  border-radius: 10px;
  box-shadow: 5px 5px 0px rgb(0, 0, 0);
  transition-duration: .3s;
}

.svg {
  width: 13px;
  position: absolute;
  right: 0;
  margin-right: 20px;
  fill: white;
  transition-duration: .3s;
}

.Btn:hover {
  color: transparent;
}

.Btn:hover svg {
  right: 43%;
  margin: 0;
  padding: 0;
  border: none;
  transition-duration: .3s;
}

.Btn:active {
  transform: translate(3px , 3px);
  transition-duration: .3s;
  box-shadow: 2px 2px 0px rgb(140, 32, 212);
}
	</style>
    <div class="container w-75 my2 bg-light p-5">

    
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Product {{ $product->name }}</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Product Name -->
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control" placeholder="Product name" required>
                        </div>

                        <!-- Product Description -->
                        <div class="form-group">
                            <label for="description">Product Description</label>
                            <textarea name="description" id="description" class="form-control" style="resize: vertical;" placeholder="Product description" required>{{ $product->description }}</textarea>
                        </div>

                        <!-- Product Category -->
                        <div class="form-group">
                            <label for="product_category_id">Product Category</label>
                            <select name="product_category_id" id="product_category_id" class="form-control" required>
                                <option value="">Select a Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->product_category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <p>Is the category you're looking for not in this list? Create it <a target="_blank" href="/product-categories/create">here</a>.</p>
                        </div>

                        <!-- Supplier -->
                        <div class="form-group">
                            <label for="supplier_id">Supplier</label>
                            <select name="supplier_id" id="supplier_id" class="form-control" required>
                                <option value="">Select a Supplier</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" {{ $product->supplier_id == $supplier->id ? 'selected' : '' }}>
                                        {{ $supplier->name }}
                                    </option>
                                @endforeach
                            </select>
                            <p>Is the supplier you're looking for not in this list? Add them <a target="_blank" href="/suppliers/create">here</a>.</p>
                        </div>

                        <!-- Sales Price -->
                        <div class="form-group">
                            <label for="sales_price">Sales Price</label>
                            <input type="number" name="sales_price" id="sales_price" value="{{ $product->sales_price }}" class="form-control" step="0.01" placeholder="Sales price" required>
                        </div>

                        <!-- Buy-in Price -->
                        <div class="form-group">
                            <label for="buy_price">Buy-in Price</label>
                            <input type="number" name="buy_price" id="buy_price" value="{{ $product->buy_price }}" class="form-control" step="0.01" placeholder="Buy-in price" required>
                        </div>

                        <!-- In Stock -->
                        <div class="form-group">
                            <label for="instock">In Stock</label>
                            <select name="instock" id="instock" class="form-control" required>
                                <option value="1" {{ $product->instock == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $product->instock == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <!-- Discontinued -->
                        <div class="form-group">
                            <label for="discontinued">Discontinued</label>
                            <select name="discontinued" id="discontinued" class="form-control" required>
                                <option value="1" {{ $product->discontinued == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $product->discontinued == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <!-- Save Button -->
                        <div class="form-group text-right">
                            <button type="submit" class="Btn">Edit 
                                <svg class="svg" viewBox="0 0 512 512">
                                  <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path></svg>
                              </button>
                            <a href="{{ route('products.index') }}" style="margin-top: 20px;" class="btn btn-secondary pull-right">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
