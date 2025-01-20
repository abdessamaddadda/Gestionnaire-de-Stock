@extends('layouts.master')
@section('main')
    @include('includes.messages')
    <div class="container w-75 my2 bg-light p-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">New Customer</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('customers.store') }}" method="POST">
                        @csrf

                        <!-- Customer Name -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Customer Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Customer name">
                                </div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                                </div>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone number">
                                </div>
                            </div>
                        </div>

                        <!-- Address: Street and House Number -->
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label for="street">Street Name</label>
                                    <input type="text" name="street" id="street" class="form-control" placeholder="Street name">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="house_number">House Number</label>
                                    <input type="text" name="house_number" id="house_number" class="form-control" placeholder="House number">
                                </div>
                            </div>
                        </div>

                        <!-- Postal Code -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="postal">Postal / Zip Code</label>
                                    <input type="text" name="postal" id="postal" class="form-control" placeholder="Postal / Zip code">
                                </div>
                            </div>
                        </div>

                        <!-- State/Province and Country -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="state_province_county">State / Province / County</label>
                                    <input type="text" name="state_province_county" id="state_province_county" class="form-control" placeholder="State / Province / County">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" name="country" id="country" class="form-control" placeholder="Country">
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" style="margin-top: 20px;" class="btn btn-success pull-right">Create Customer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
