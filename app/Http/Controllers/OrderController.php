<?php

namespace App\Http\Controllers;

use App\Order;
use App\Market;
use App\WarehouseOrder;
use App\WarehouseUsers;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('status', 0)->get();
        $markets = Market::all();
        $warehouses_user = WarehouseUsers::where('user_id', auth()->user()->id)->get();
        return view('dashboard.orders.index', compact('orders', 'warehouses_user', 'markets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer'          => 'required | string | max:45', 
            'phone'             => 'required | string | max:45',  
            'address'           => 'required | string | max:255',
            'amount'            => 'required' ,
            'receiver'          => 'required | string | max:45',
            'receiver_address'  => 'required | string | max:45', 
            'receiver_phone'    => 'required | string | max:45', 
            'description' => 'required',
        ]);

        $order = Order::create($request->all());

        $warehouse = WarehouseOrder::create([
            'order_id' => $order->id,
            'user_id' => auth()->user()->id,
            'warehouse_id' => $request->warehouse_id,
        ]);

        $order->update([
            'status' => Order::$status_in_warehouse,
            'order_number' => ($order->id * rand(0, 10000))
        ]);

        return back()->with('success', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->update([
            'status' => Order::$status_cancel
        ]);

        return back();
    }


    public function orders(Request $request) {
        $orders = Order::where('market_id', $request->market)->where('status', 0)->get();
        return response()->json($orders);
    }
}
