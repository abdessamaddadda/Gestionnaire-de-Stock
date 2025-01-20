@extends('layouts.master')
@section('main')
@include('includes.messages')

<style>
  /* Global Styles */
body {
    background-color: #f4f6f9;
    font-family: Arial, sans-serif;
    color: #333;
}

h1 {
    font-size: 28px;
    font-weight: 600;
    color: #333;
}

/* Profile Box */
.box-profile {
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.box-profile .profile-user-img {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    margin-bottom: 10px;
}

.box-profile .profile-username {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
    color: #555;
}

.list-group-item {
    border: 0;
    padding: 10px 0;
    font-size: 14px;
    color: #666;
}

.list-group-item b {
    color: #333;
}

/* Orders Table */
.table-responsive {
    margin-top: 20px;
}

.table {
    width: 100%;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.table th, .table td {
    padding: 12px 15px;
    text-align: left;
    font-size: 14px;
    color: #555;
}

.table th {
    background-color: #f7f7f7;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
}

.table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.table tr:hover {
    background-color: #e9e9e9;
}

/* Order Status Labels */
.label {
    padding: 5px 10px;
    font-size: 12px;
    border-radius: 5px;
}

.label-warning {
    background-color: #f39c12;
    color: #fff;
}

.label-info {
    background-color: #17a2b8;
    color: #fff;
}

.label-success {
    background-color: #28a745;
    color: #fff;
}

.label-danger {
    background-color: #dc3545;
    color: #fff;
}

/* Button Styles */
.btn {
    font-size: 14px;
    padding: 8px 15px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.btn-default {
    background-color: #6c757d;
    color: white;
}

.btn-default:hover {
    background-color: #5a6268;
}

.btn-sm {
    padding: 5px 10px;
}

.pull-left {
    float: left;
}

.pull-right {
    float: right;
}

.box-footer {
    padding: 15px;
    background: #fff;
    border-top: 1px solid #ddd;
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
}

/* Mobile Responsiveness */
@media (max-width: 768px) {
    .col-sm-3 {
        margin-bottom: 20px;
    }

    .col-sm-9 {
        margin-bottom: 20px;
    }

    .table th, .table td {
        padding: 8px 10px;
        font-size: 12px;
    }

    .box-profile {
        padding: 15px;
    }
}

/* From Uiverse.io by roroland */ 
.button {
  --fs: 1.2em;
  --col1: honeydew;
  --col2: rgba(240, 128, 128, 0.603);
  --col3: indianred;
  --col4: maroon;
  --pd: .5em .65em;
  display: grid;
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
    <div class="col-sm-3">
      <div class="box box-danger">
        <div class="box-body box-profile">
          <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>
          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Email address</b> <a class="pull-right">{{auth()->user()->email}}</a>
            </li>
            <li class="list-group-item">
              <b>Member since</b> <a class="pull-right">{{auth()->user()->created_at}}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-sm-9">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Incoming orders (recent)</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>

        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
              <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Status</th>
                <th>Placed at</th>
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
                  <td>{{$order->customer->name}}</td>
                  <td><span class="text-{{$label}}" style="font-weight: bolder">{{$order->status}}</span></td>
                  <td>{{$order->created_at}}</td>
                </tr>
              @endforeach

              </tbody>
            </table>
          </div>

        </div>
        <div class="box-footer clearfix">
          <a href="{{url('')}}/orders/create" class="btn btn-sm btn-primary pull-left">New Order</a>
          <a href="{{url('')}}/orders" class=" pull-right">
          <button class="button">
            <span>View all orders</span>
          </button>
        </a>
        </div>
      </div>
    </div>
    </div>
  </div>
@endsection

