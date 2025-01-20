@extends('layouts.master')
@section('main')
	@include('includes.messages')
	<style>
		.button {
  --fs: 1.2em;
  --col1: honeydew;
  --col2: rgba(240, 128, 128, 0.603);
  --col3: indianred;
  --col4: maroon;
  --pd: .5em .65em;
  display: grid;
  width: 160px;
  align-content: baseline;
  appearance: none;
  border: 0;
  grid-template-columns: min-content 1fr;
  padding: var(--pd);
  font-size: var(--fs);
  color: var(--col1);
  background-color: var(--col3);
  border-radius: 6px;
  text-shadow: 1px 1px var(--col4);
  box-shadow: inset -2px 1px 1px var(--col2),
    inset 2px 1px 1px var(--col2);
  position: relative;
  transition: all .75s ease-out;
  transform-origin: center;
}

.button:hover {
  color: var(--col4);
  box-shadow: inset -2px 1px 1px var(--col2),
    inset 2px 1px 1px var(--col2),
    inset 0px -2px 20px var(--col4),
    0px 20px 30px var(--col3),
    0px -20px 30px var(--col2),
    1px 2px 20px var(--col4);
  text-shadow: 1px 1px var(--col2);
}

.button:active {
  animation: offset 1s ease-in-out infinite;
  outline: 2px solid var(--col2);
  outline-offset: 0;
}

.button::after,
.button::before {
  content: '';
  align-self: center;
  justify-self: center;
  height: .5em;
  margin: 0 .5em;
  grid-column: 1;
  grid-row: 1;
  opacity: 1;
}

.button::after {
  position: relative;
  border: 2px solid var(--col4);
  border-radius: 50%;
  transition: all .5s ease-out;
  height: .1em;
  width: .1em;
}

.button:hover::after {
  border: 2px solid var(--col3);
  transform: rotate(-120deg) translate(10%, 140%);
}

.button::before {
  border-radius: 50% 0%;
  border: 4px solid var(--col4);
  box-shadow: inset 1px 1px var(--col2);
  transition: all 1s ease-out;
  transform: rotate(45deg);
  height: .45em;
  width: .45em;
}

.button:hover::before {
  border-radius: 50%;
  border: 4px solid var(--col1);
  transform: scale(1.25) rotate(0deg);
  animation: blink 1.5s ease-out 1s infinite alternate;
}

.button:hover > span {
  filter: contrast(150%);
}

@keyframes blink {
  0% {
    transform: scale(1, 1) skewX(0deg);
    opacity: 1;
  }

  5% {
    transform: scale(1.5, .1) skewX(10deg);
    opacity: .5;
  }

  10%,
  35% {
    transform: scale(1, 1) skewX(0deg);
    opacity: 1;
  }

  40% {
    transform: scale(1.5, .1) skewX(10deg);
    opacity: .25;
  }

  45%,
  100% {
    transform: scale(1, 1) skewX(0deg);
    opacity: 1;
  }
}

@keyframes offset {
  50% {
    outline-offset: .15em;
    outline-color: var(--col1);
  }

  55% {
    outline-offset: .1em;
    transform: translateY(1px);
  }

  80%,
  100% {
    outline-offset: 0;
  }
}
	</style>
    <div class="row">
			<div class="col-sm-12">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Orders</h3>
					</div>
					<div class="box-body">
						<table class="table" id="datatable">
							<thead>
								<tr>
									<th>#</th>
									<th>Customer name</th>
									<th>Status</th>
									<th>Created at</th>
                  <th></th>
								</tr>
							</thead>
							<tbody>

								@foreach ($orders as $order)

	                @php
	                  if(in_array($order->status, ['Quote', 'Quote sent'])) {
	                    $label = 'warning';
	                  } elseif(in_array($order->status, ['Processing', 'Awaiting payment', 'Ready to ship'])) {
	                    $label = 'info';
	                  } elseif(in_array($order->status, ['Shipped'])) {
	                    $label = 'success';
	                  } elseif(in_array($order->status, ['Cancelled', 'Back order'])) {
	                    $label = 'danger';
	                  } else {$label = '';}
	                @endphp

	                <tr>
	                  <td>{{$order->id}}</td>
	                  <td><a href="{{url('')}}/customers/{{$order->customer->id}}">{{$order->customer->name}}</a></td>
	                  <td><span class="text-{{$label}}" style="font-weight: bolder">{{$order->status}}</span></td>
	                  <td>{{$order->created_at}}</td>
                    <td><a href="{{url('')}}/orders/{{$order->id}}" >
						<button class="button">
							<span>View</span>
						  </button>
						</a>
					</td>
          <td></td>
	                </tr>
	              @endforeach

							</tbody>
						</table>
					</div>
				</div>
			</div>
    </div>
@endsection
	