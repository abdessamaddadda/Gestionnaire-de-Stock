<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the customers
        $customers = Customer::all();

        // return the view
        return view('customers.index')->with('customers', $customers);
    }
    public function create()
    {
        // return view
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $this->validate($request, [
          'name' => 'required|min:3|max:150|unique:customers,email',
          'email' => 'required|min:3|max:150|email|unique:customers,email',
          'phone' => 'required|min:3|max:150',
          'street' => 'required|min:3|max:150',
          'house_number' => 'required|min:1|max:150',
          'postal' => 'required|min:1|max:150',
          'state_province_county' => 'required|min:3|max:150',
          'country' => 'required|min:3|max:150'
        ]);

        // new instance of the model
        $customer = new Customer;

        // set attributes
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->street = $request->input('street');
        $customer->house_number = $request->input('house_number');
        $customer->postal = $request->input('postal');
        $customer->state_province_county = $request->input('state_province_county');
        $customer->country = $request->input('country');

        // save the customer
        $customer->save();

        // redirect
        return redirect('/customers')->with('success', 'Customer has been created successfully!');
    }
    public function show($customer)
    {
        // get the customer
        $customer = Customer::find($customer);
        $orders = Order::where('customer_id', $customer->id)->get();

        // return view
        return view('customers.show')->with('customer', $customer)->with('orders', $orders);
    }
    public function edit($customer)
    {
        // get the customer
        $customer = Customer::find($customer);

        // return view
        return view('customers.edit')->with('customer', $customer);
    }
    public function update(Request $request, $customer)
    {
      // get existing customer
      $customer = Customer::find($customer);

        // validate
        $this->validate($request, [
          'name' => 'required|min:3|max:150|unique:customers,email,'.$customer->id,
          'email' => 'required|min:3|max:150|email|unique:customers,email,'.$customer->id,
          'phone' => 'required|min:3|max:150',
          'street' => 'required|min:3|max:150',
          'house_number' => 'required|min:1|max:150',
          'postal' => 'required|min:1|max:150',
          'state_province_county' => 'required|min:3|max:150',
          'country' => 'required|min:3|max:150'
        ]);

        // set attributes
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->street = $request->input('street');
        $customer->house_number = $request->input('house_number');
        $customer->postal = $request->input('postal');
        $customer->state_province_county = $request->input('state_province_county');
        $customer->country = $request->input('country');

        // save the customer
        $customer->save();

        // redirect
        return redirect('/customers')->with('success', 'Customer has been updated and changes were saved!');
    }
    public function destroy(Customer $customer)
    {
        //
    }
}
