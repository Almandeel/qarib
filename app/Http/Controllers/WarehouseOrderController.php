<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Order;
use App\BillOrder;
use App\WarehouseOrder;
use Illuminate\Http\Request;

class WarehouseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $orders = Order::where('market_id', $request->market_id)->get();

        $bill = Bill::create([
            'name' => $request->name,
            'orders' => count($orders),
            'type' => Bill::$receved_warehouse,
            'market_id' => $request->market_id,
            'warehouse_id' => $request->warehouse_id,
            'user_id' => auth()->user()->id
        ]);


        $amount = 0;
        for ($index = 0; $index < count($orders); $index++) { 
            $bill_order = BillOrder::create([
                'bill_id' => $bill->id,
                'order_id' => $orders[$index]->id,
            ]);

            WarehouseOrder::create([
                'order_id' => $orders[$index]->id,
                'warehouse_id' => $request->warehouse_id,
                'user_id' => auth()->user()->id
            ]);

            $orders[$index]->update(['status' => Order::$status_in_warehouse]);

            $amount += $orders[$index]->amount;
        }

        $bill->update([
            'amount' => $amount
        ]);

        return back()->with('success', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WarehouseOrder  $warehouseOrder
     * @return \Illuminate\Http\Response
     */
    public function show(WarehouseOrder $warehouseOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WarehouseOrder  $warehouseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(WarehouseOrder $warehouseOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WarehouseOrder  $warehouseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $warehouseOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WarehouseOrder  $warehouseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(WarehouseOrder $warehouseOrder)
    {
        //
    }


    public function status(Request $request) {
        for ($index=0; $index < count($request->order_id); $index++) {
            $order = Order::find($request->order_id[$index]);
            // $warehouseOrder = WarehouseOrder::find($order->warehouseOrder->id);
            if($order->status == Order::$status_done) {
                // $warehouseOrder->update([
                //     'status' => 2
                // ]);

                $order->update([
                    'driver_amount' => $order->delivery_amount - ($order->delivery_amount * $order->driverOrders->last()->driver->commission  / 100),
                    'net' => ($order->delivery_amount * $order->driverOrders->last()->driver->commission  / 100),
                    'status' => Order::$status_done
                ]);

            }elseif($order->status == Order::$status_schedule) {
                // $warehouseOrder->update([
                //     'status' => 0
                // ]);

                $order->update([
                    'status' => Order::$status_accepted
                ]);
            }elseif($order->status == Order::$status_cancel) {
                // $warehouseOrder->update([
                //     'status' => 3
                // ]);

                $order->update([
                    'driver_amount' => $order->delivery_amount - ($order->delivery_amount * $order->driverOrders->last()->driver->commission  / 100),
                    'net' => ($order->delivery_amount * $order->driverOrders->last()->driver->commission  / 100),
                    'status' => Order::$status_cancel
                ]);
            }
    
        $order->BillOrder->last()->bill->update([
            'order_done' => ($order->BillOrder->last()->bill->order_done + 1)
        ]);

        if($order->BillOrder->last()->bill->order_done == $order->BillOrder->last()->bill->orders) {
            $order->BillOrder->last()->bill->driver->update([
                'status' => 0
            ]);

            $order->BillOrder->last()->bill->update([
                'status' => 1
            ]);
        }
        }

        return back()->with('success', 'success');
    }

}
