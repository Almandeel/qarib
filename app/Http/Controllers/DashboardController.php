<?php

namespace App\Http\Controllers;

use App\Bill;
use App\User;
use App\Order;
use App\Driver;
use App\Market;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $search_order = null;
        if($request->order_id){
            $search_order = Order::where('order_number', $request->order_id)->first();
        }
        $orders = Order::limit(10)->where('status', 0)->orderBy('order_number','desc')->get();
        $all_users = count(User::where('id', '!=', 1)->get());
        $all_orders = count(Order::get());
        $all_markets = count(Market::get());
        $all_drivers = count(Driver::get());
        $all_cloced_bills = count(Bill::where('status', 1)->where('driver_id', '!=', null)->get());
        $all_open_bills = count(Bill::where('status', 0)->where('driver_id', '!=', null)->get());
        return view('dashboard.index', compact('orders', 'all_users', 'all_orders', 'all_markets', 'all_drivers', 'all_cloced_bills', 'all_open_bills', 'search_order'));
    }
}
