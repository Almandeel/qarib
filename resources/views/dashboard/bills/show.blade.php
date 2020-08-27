@extends('layouts.dashboard.app', ['datatable' => true])

@section('title')
    Bill | {{ $bill->id }}
@endsection

@section('content')
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>Number</th>
                    @if($bill->warehouse_id != null)
                        <th>Market</th>
                        <th>Warehouse</th>
                    @else 
                        <th>Driver</th>
                    @endif
                    <th>Orders</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $bill->id }}</td>
                    @if($bill->warehouse_id != null)
                    <td>{{ $bill->market->name }}</td>
                    <td>{{ $bill->warehouse->name }}</td>
                    @else 
                        <td>{{ $bill->driver->name }}</td>
                    @endif
                    <td>{{ $bill->orders }}</td>
                    <td>{{ $bill->amount }}</td>
                    <td>{{ $bill->created_at->format('Y-m-d') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

@if($bill->warehouse_id == null)
    @if($bill->orders != $bill->order_done)
        <form  action="{{ route('order.status') }}" method="post">
            <div class="card">
                <div class="card-header">
                    <h3>Orders <span class="float-right"><button class="btn btn-success btn-xs order" ><i class="fa fa-check"> Receved </i></button></span></h3>
                </div>
                    <div class="card-body">
                        <div class="row">
                                <div class="col-md-4">
                                    @csrf
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Orders Done </h4>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table class="table table-responsive table-bordered table-hover text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <th>address</th>
                                                        <th>amount</th>
                                                        <th>Option</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $total_done = 0;  
                                                        $total_schedule = 0;  
                                                        $total_cancel = 0;  
                                                    @endphp
                                                    @foreach ($bill->billOrders as $order)
                                                        @if($order->order->status == \App\Order::$status_done)
                                                            <tr>
                                                                <td>{{ $order->order->order_number }}</td>
                                                                <td>{{ $order->order->address }}</td>
                                                                <td>{{ $order->order->amount }}</td>
                                                                <td>
                                                                    <a href="{{ route('return.orders', $bill->driver->orders->where('order_id', $order->order->id)->last()->id) }}?type=schedule" class="btn btn-dark btn-xs"><i class="fa fa-clock"></i></a>
                                                                    <a href="{{ route('return.orders', $bill->driver->orders->where('order_id', $order->order->id)->last()->id) }}?type=cancel" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></a>
                                                                </td>
                                                                @if($order->pyment_status == 0)
                                                                    @php 
                                                                        $total_done += $order->order->amount;
                                                                    @endphp
                                                                @endif
                                                            </tr>
                                                            <input type="hidden" name="order_id[]" value="{{ $order->order->id }}">
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <th>Total</th>
                                                    <th></th>
                                                    <th>{{ $total_done }}</th>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                        
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Orders Return</h4>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table table-responsive table-bordered table-hover text-center">
                                            <thead>
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>address</th>
                                                    <th>amount</th>
                                                    <th>options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bill->billOrders as $order)
                                                    @if($order->order->status == \App\Order::$status_schedule)
                                                        <tr>
                                                            <td>{{ $order->order->order_number }}</td>
                                                            <td>{{ $order->order->address }}</td>
                                                            <td>{{ $order->order->amount }}</td>
                                                            <td>
                                                                <a href="{{ route('return.orders', $bill->driver->orders->where('order_id', $order->order->id)->last()->id) }}?type=done" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
                                                                <a href="{{ route('return.orders', $bill->driver->orders->where('order_id', $order->order->id)->last()->id) }}?type=cancel" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></a>
                                                            </td>
                                                            @if($order->pyment_status == 0)
                                                                @php 
                                                                    $total_schedule += $order->order->amount;
                                                                @endphp
                                                            @endif
                                                        </tr>
                                                        <input type="hidden" name="order_id[]" value="{{ $order->order->id }}">
                                                    @endif
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <th>Total</th>
                                                <th></th>
                                                <th>{{ $total_schedule }}</th>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Orders Cancel</h4>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table table-responsive table-bordered table-hover text-center">
                                            <thead>
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>address</th>
                                                    <th>amount</th>
                                                    <th>options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bill->billOrders as $order)
                                                    @if($order->order->status == \App\Order::$status_cancel)
                                                        <tr>
                                                            <td>{{ $order->order->order_number }}</td>
                                                            <td>{{ $order->order->address }}</td>
                                                            <td>{{ $order->order->amount }}</td>
                                                            <td>
                                                                <a href="{{ route('return.orders', $bill->driver->orders->where('order_id', $order->order->id)->last()->id) }}?type=done" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
                                                                <a href="{{ route('return.orders', $bill->driver->orders->where('order_id', $order->order->id)->last()->id) }}?type=schedule" class="btn btn-dark btn-xs"><i class="fa fa-clock"></i></a>
                                                            </td>
                                                            @if($order->pyment_status == 0)
                                                                @php 
                                                                    $total_cancel += $order->order->amount;
                                                                @endphp
                                                            @endif
                                                        </tr>
                                                        <input type="hidden" name="order_id[]" value="{{ $order->order->id }}">
                                                    @endif
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <th>Total</th>
                                                <th></th>
                                                <th>{{ $total_cancel }}</th>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </form>
    @else
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
                            <th>Customer</th>
                            <th>address</th>
                            <th>phone</th>
                            <th>amount</th>
                            <th>status</th>
                            <th>Driver At</th>
                            <th>Delivered At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bill->billOrders as $order)
                        <tr>
                            <td>{{ $order->order->order_number }}</td>
                            <td>{{ $order->order->customer }}</td>
                            <td>{{ $order->order->address }}</td>
                            <td>{{ $order->order->phone }}</td>
                            <td>{{ $order->order->amount }}</td>
                            <td>
                                @if($order->status == \App\Order::$status_cancel)
                                    Cancel
                                @elseif($order->status == \App\Order::$status_schedule)
                                    Return
                                @else
                                    Done
                                @endif
                            </td>
                            <td>{{ $order->order->driverOrders->last()->created_at->format('Y-m-d H:i') ?? '' }}</td>
                            <td>{{ $order->order->driverOrders->last()->updated_at->format('Y-m-d H:i') ?? '' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    @endif
@else
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
                        <th>Customer</th>
                        <th>address</th>
                        <th>phone</th>
                        <th>amount</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bill->billOrders as $order)
                    <tr>
                        <td>{{ $order->order->order_number }}</td>
                        <td>{{ $order->order->customer }}</td>
                        <td>{{ $order->order->address }}</td>
                        <td>{{ $order->order->phone }}</td>
                        <td>{{ $order->order->amount }}</td>
                        <td>
                            @if($order->status == \App\Order::$status_cancel)
                                Cancel
                            @elseif($order->status == \App\Order::$status_schedule)
                                Return
                            @else
                                Done
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endif


@endsection