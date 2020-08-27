<?php

namespace App\Http\Controllers;

use App\User;
use App\Driver;
use App\Warehouse;
use App\WarehouseUsers;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouses = Warehouse::all();
        return view('dashboard.warehouses.index', compact('warehouses'));
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
            'name' => 'required',
        ]);

        $request_data = $request->all();

        $warehouse = Warehouse::create($request_data);

        WarehouseUsers::create([
            'warehouse_id' => $warehouse->id,
            'user_id' => auth()->user()->id,
        ]);

        return back()->with('success', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show(Warehouse $warehouse)
    {
        $users = User::all();
        return view('dashboard.warehouses.show', compact('warehouse', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Warehouse $warehouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warehouse $warehouse)
    {

        $request->validate([
            'name' => 'required',
        ]);

        $request_data = $request->all();

        $warehouse->update($request_data);

        return back()->with('success', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warehouse $warehouse)
    {
        //
    }

    public function orders($id) {
        $warehouse = Warehouse::find($id);
        $drivers = Driver::where('status', 0)->get();
        $user_warehouses = WarehouseUsers::where('user_id', auth()->user()->id)->get();
        return view('dashboard.warehouses.orders', compact('warehouse', 'drivers', 'user_warehouses'));
    }
}
