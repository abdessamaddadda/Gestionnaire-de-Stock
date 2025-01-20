<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // get recent orders
        $orders = Order::orderBy('id', 'DESC')->take(10)->get();

        return view('home')->with('orders', $orders);
    }
}
