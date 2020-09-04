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
    public function index(Request $request)
    {
        if($request->type == 'deactive') {
            $orders = Order::where('status', 0)->get();
        }else {
            $orders = Order::where('status', 1)->get();
        }
        $markets = Market::all();
        // $warehouses_user = WarehouseUsers::where('user_id', auth()->user()->id)->get();
        return view('dashboard.orders.index', compact('orders', 'markets'));
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
            'phone'             => 'required | string | max:45',  
            'address'           => 'required | string | max:255',
            'amount'            => 'required' ,
            'receiver_address'  => 'required | string | max:45', 
            'receiver_phone'    => 'required | string | max:45', 
            'description' => 'required',
        ]);

        $request_data = $request->except('_token');
        $request_data['delivery_amount'] = $request->from == $request->to ? 200 : 250;

        if($request->market_id) {
            $request_data['market_id'] = $request->market_id;
        }

        $order = Order::create($request_data);

        // $warehouse = WarehouseOrder::create([
        //     'order_id' => $order->id,
        //     'user_id' => auth()->user()->id,
        //     'warehouse_id' => $request->warehouse_id,
        // ]);

        $order->update([
            'status' => Order::$status_accepted,
            'order_number' => date('Ym') . $order->id
        ]);

        return back()->with('success', 'تمت العملية بنجاح');
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
        return view('dashboard.orders.edit', compact('order'));
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
        if($request->type == 'accepted') {
            $order->update([
                'status' => Order::$status_accepted,
            ]);
            return back()->with('success', 'تمت العملية بنجاح');
        }else {
            $request->validate([
                'phone'             => 'required | string | max:45',  
                'address'           => 'required | string | max:255',
                'amount'            => 'required' ,
                'receiver_address'  => 'required | string | max:45', 
                'receiver_phone'    => 'required | string | max:45', 
                'description' => 'required',
            ]);
    
            $request_data = $request->except('_token');    

            if($request->market_id) {
                $request_data['market_id'] = $request->market_id;
            }
    
            $order->update($request_data);


            return redirect()->route('orders.index')->with('success', 'تمت العملية بنجاح');
        }
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


    public function marketOrdersStore(Request $request) {
        $request->validate([
            'phone'             => 'required | string | max:45',  
            'address'           => 'required | string | max:255',
            'amount'            => 'required' ,
            'receiver_address'  => 'required | string | max:45', 
            'receiver_phone'    => 'required | string | max:45', 
        ]);

        $request_data = $request->except('_token');
        $request_data['delivery_amount'] = $request->from == $request->to ? 200 : 250;

        if($request->market_id) {
            $request_data['market_id'] = $request->market_id;
        }

        $order = Order::create($request_data);

        // $warehouse = WarehouseOrder::create([
        //     'order_id' => $order->id,
        //     'user_id' => auth()->user()->id,
        //     'warehouse_id' => $request->warehouse_id,
        // ]);

        $order->update([
            'order_number' => date('Ym') . $order->id
        ]);

        return back()->with('success', 'تمت العملية بنجاح');
    }
}
