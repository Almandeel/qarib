<?php

namespace App\Http\Controllers;

use App\User;
use App\Driver;
use App\DriverOrder;
use App\WarehouseUsers;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::all();
        return view('dashboard.drivers.index', compact('drivers'));
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
            'name'      => 'required',
            'phone'     => 'required | unique:users',
            'address'   => 'required',
            'car'       => 'required',
        ]);

        $request_data = $request->all();

        $driver = Driver::create($request_data);

        $user = User::create([
            'phone'         => $request->phone,
            'name'          => $request->name,
            'password'      => bcrypt(123456),
            'driver_id'     => $driver->id,
        ]);

        $user->attachRole('drivers');

        return back()->with('success', 'تمت العملية بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        // $user_warehouses = WarehouseUsers::where('user_id', auth()->user()->id)->get();
        $orders = DriverOrder::where('driver_id', $driver->id)->where('status', 0)->get();
        return view('dashboard.drivers.show', compact('driver', 'orders'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'name'      => 'required',
            'phone'     => ['required', 'string',  Rule::unique('drivers', 'phone')->ignore($driver->id)],
            'phone'     => ['required', 'string',  Rule::unique('users', 'phone')->ignore($driver->user->phone)],
            'address'   => 'required',
            'car'       => 'required',
        ]);

        $request_data = $request->all();
        
        $driver->update($request_data);

        return back()->with('success', 'تمت العملية بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        //
    }
}
