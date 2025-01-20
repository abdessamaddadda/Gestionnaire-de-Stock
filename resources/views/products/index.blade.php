@extends('layouts.master')
@section('main')
	@include('includes.messages')

	<style>
		/* From Uiverse.io by vinodjangid07 */ 
.Btn {
  position: relative;
  display: flex;
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
.noselect {
 width: 160px;
 height: 40px;
 cursor: pointer;
 display: flex;
 align-items: center;
 background: red;
 border: none;
 border-radius: 5px;
 box-shadow: 1px 1px 3px rgba(0,0,0,0.15);
 background: #e62222;
}

.noselect, .noselect .text {
 transition: 200ms;
}

.noselect .text {
 transform: translateX(35px);
 color: white;
 font-weight: bold;
}

.noselect .icon {
 position: absolute;
 border-left: 1px solid #c41b1b;
 transform: translateX(110px);
 height: 40px;
 width: 40px;
 display: flex;
 align-items: center;
 justify-content: center;
}

.noselect .sv {
 width: 15px;
 fill: #eee;
}

.noselect:hover {
 background: #ff3636;
}

.noselect:hover .text {
 color: transparent;
}

.noselect:hover .icon {
 width: 150px;
 border-left: none;
 transform: translateX(0);
}

.noselect:focus {
 outline: none;
}

.noselect:active .icon .sv {
 transform: scale(0.8);
}
	</style>
    <div class="row">
			<div class="col-sm-12">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Products</h3>
					</div>
					<div class="box-body">
						<table class="table" id="datatable">
							<thead>
								<tr>
									<th>#</th>
									<th>Product name</th>
                  <th>Sales price</th>
                  <th>Buy-in price</th>
                  <th>Instock</th>
                  <th>Discontinued</th>
									<th></th>
								</tr>
							</thead>
							<tbody>

								@foreach ($products as $product)
									<tr>
										<td>{{$product->id}}</td>
										<td>{{$product->name}}</td>
                    <td>{{$product->sales_price}}</td>
                    <td>{{$product->buy_price}}</td>
                    <td>
                      @if ($product->instock == 1)
                        Yes
                      @else
                        No
                      @endif
                    </td>
                    <td>
                      @if ($product->discontinued == 1)
                        Yes
                      @else
                        No
                      @endif
                    </td>
                    <td>
                      <form method="POST" action="{{route('products.destroy', $product->id)}}">
                        @csrf
                        @method('DELETE')
                        <button class="noselect" type="submit">
                          <span class="text">Delete</span>
                          <span class="icon">
                              <svg xmlns="http://www.w3.org/2000/svg" class="sv" width="24" height="24" viewBox="0 0 24 24">
                                  <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
                              </svg>
                          </span>
                      </button>
                      </form>
                    </td>
										<td><a href="/products/{{$product->id}}/edit">
											<button class="Btn">Edit 
											   <svg class="svg" viewBox="0 0 512 512">
												 <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path></svg>
											 </button>
										 </a>
										 
										</td>
									</tr>
								@endforeach

							</tbody>
						</table>
					</div>
				</div>
			</div>
    </div>
@endsection

