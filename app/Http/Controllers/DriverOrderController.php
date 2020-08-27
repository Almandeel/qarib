<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Order;
use App\BillOrder;
use App\DriverOrder;
use App\WarehouseOrder;
use Illuminate\Http\Request;

class DriverOrderController extends Controller
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
        // dd($request->all());

        $bill = Bill::create([
            'orders' => count($request->order_id),
            'type' => 1,
            'user_id' => auth()->user()->id,
            'driver_id' => $request->driver_id,
        ]);

        $amount = 0;
        for ($index=0; $index < count($request->order_id); $index++) { 

            $order = Order::find($request->order_id[$index]);

            $order->update(['status' => Order::$status_in_drivers]);

            $order->warehouseOrder->update(['status' => '1']);

            driverOrder::create([
                'order_id' => $order->id,
                'warehouseorder_id' => 	$order->warehouseOrder->id,
                'driver_id' => $request->driver_id,
                'user_id' =>  auth()->user()->id
            ]);

            BillOrder::create([
                'bill_id' => $bill->id,
                'order_id' => $order->id,
            ]);

            $amount += $order->amount;
        }
        
        $bill->update([
            'amount' => $amount
        ]);

        $bill->driver->update([
            'status' => 1
        ]);

        return back()->with('success', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DriverOrder  $driverOrder
     * @return \Illuminate\Http\Response
     */
    public function show(DriverOrder $driverOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DriverOrder  $driverOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(DriverOrder $driverOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DriverOrder  $driverOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $driverOrder)
    {
        $driverOrder = DriverOrder::find($driverOrder);

        if($request->type == 'done') {

            $driverOrder->order->update([
                'status' => Order::$status_done
            ]);

            $driverOrder->order->BillOrder->last()->update([
                'status' => Order::$status_done
            ]);

        }elseif($request->type == 'schedule') {

            $driverOrder->order->update([
                'status' => Order::$status_schedule,
            ]);

            $driverOrder->order->BillOrder->last()->update([
                'status' => Order::$status_schedule
            ]);

        }else {
            $driverOrder->order->update([
                'status' => Order::$status_cancel
            ]);

            $driverOrder->order->BillOrder->last()->update([
                'status' => Order::$status_cancel
            ]);
        }

        $driverOrder->update([
            'status' => '1'
        ]);

        return back()->with('success', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DriverOrder  $driverOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(DriverOrder $driverOrder)
    {
        //
    }

    public function returnOrder(Request $request, $driver_order_id) {
        $driverOrder = DriverOrder::find($driver_order_id);

        if($request->type == 'done') {

            $driverOrder->order->update([
                'status' => Order::$status_done
            ]);

            $driverOrder->order->BillOrder->last()->update([
                'status' => Order::$status_done
            ]);

        }elseif($request->type == 'schedule') {

            $driverOrder->order->update([
                'status' => Order::$status_schedule,
            ]);

            $driverOrder->order->BillOrder->last()->update([
                'status' => Order::$status_schedule
            ]);

        }else {
            $driverOrder->order->update([
                'status' => Order::$status_cancel
            ]);

            $driverOrder->order->BillOrder->last()->update([
                'status' => Order::$status_cancel
            ]);
        }

        $driverOrder->update([
            'status' => '1'
        ]);

        return back()->with('success', 'success');
    }
}
