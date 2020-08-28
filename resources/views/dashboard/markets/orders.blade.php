@extends('layouts.dashboard.app', ['datatable' => true])

@section('title')
    Orders
@endsection

@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3>Orders</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>receiver</th>
                        <th>receiver address</th>
                        <th>receiver_phone</th>
                        <th>amount</th>
                        <th>status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->order_number }}</td>
                        <td>{{ $order->receiver }}</td>
                        <td>{{ $order->receiver_address }}</td>
                        <td>{{ $order->receiver_phone }}</td>
                        <td>{{ $order->amount }}</td>
                        <td>
                            @if($order->status == \App\Order::$status_default)
                                New
                            @endif

                            @if($order->status == \App\Order::$status_accepted)
                             Accepted
                            @endif

                            @if($order->status == \App\Order::$status_cancel)
                                Cancel
                            @endif

                            @if($order->status == \App\Order::$status_done)
                                Done
                            @endif

                            @if($order->status == \App\Order::$status_in_drivers)
                                In Driver
                            @endif
                        </td>
                        <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</section>

@include('dashboard.modals.market_orders')

@endsection