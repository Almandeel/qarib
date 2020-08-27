<?php

namespace App\Http\Controllers;

use App\WarehouseUsers;
use Illuminate\Http\Request;

class WarehouseUsersController extends Controller
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
        $request_data = $request->all();

        WarehouseUsers::create($request_data);

        return back()->with('success', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WarehouseUsers  $warehouseUsers
     * @return \Illuminate\Http\Response
     */
    public function show(WarehouseUsers $warehouseUsers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WarehouseUsers  $warehouseUsers
     * @return \Illuminate\Http\Response
     */
    public function edit(WarehouseUsers $warehouseUsers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WarehouseUsers  $warehouseUsers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WarehouseUsers $warehouseUsers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WarehouseUsers  $warehouseUsers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = WarehouseUsers::find($id);
        $user->delete();

        return back()->with('success', 'success');
    }
}
