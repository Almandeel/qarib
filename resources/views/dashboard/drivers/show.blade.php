@extends('layouts.dashboard.app', ['datatable' => true])

@section('title')
    Drivers | {{ $driver->name }}
@endsection

@section('content')
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $driver->id }}</td>
                </tr>
                <tr>
                    <th>name</th>
                    <td>{{ $driver->name }}</td>
                </tr>
                <tr>
                    <th>phone</th>
                    <td>{{ $driver->phone }}</td>
                </tr>
                <tr>
                    <th>Car</th>
                    <td>{{ $driver->car }}</td>
                </tr>
                <tr>
                    <th>slaray</th>
                    <td>{{ $driver->salary ? $driver->salary : '-'  }}</td>
                </tr>
                <tr>
                    <th>commission</th>
                    <td>{{ $driver->commission ? $driver->commission : '-' }}</td>
                </tr>
                <tr>
                    <th>max orders</th>
                    <td>{{ $driver->max_orders ? $driver->max_orders : '-' }}</td>
                </tr>
                <tr>
                </tr>
            </thead>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Orders</h3>
    </div>
    <div class="card-body">
        @foreach ($orders as $order)
            <table style="margin-bottom:3%;" class="table table-bordered table-striped text-center">
                <tbody>
                    <tr>
                        <th>Order ID</th>
                        <td>{{ $order->order_number }}</td>
                    </tr>
                    <tr>
                        <th>Customer</th>
                        <td id="customer">{{ $order->customer }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td id="phone">{{ $order->phone }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td id="address">{{ $order->address }}</td>
                    </tr>
                    <tr>
                        <th>Receiver</th>
                        <td id="receiver">{{ $order->receiver }}</td>
                    </tr>
                    <tr>
                        <th>Receiver Phone</th>
                        <td id="receiver_phone">{{ $order->receiver_phone }}</td>
                    </tr>
                    <tr>
                        <th>Receiver Address</th>
                        <td id="receiver_address">{{ $order->receiver_address }}</td>
                    </tr>
                    <tr>
                        <th>Amount</th>
                        <td id="amount">{{ $order->amount }}</td>
                    </tr>
                    <tr>
                        <th>Pyment Status</th>
                        <td id="pyment">{{ $order->pyment_status ? 'Pay' : 'Non pay' }}</td>
                    </tr>
                    <tr>
                        <th>Delivery amount</th>
                        <td id="delivery_amount">{{ $order->delivery_amount }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td id="description">{{ $order->description }}</td>
                    </tr>
                    <tr>
                        <th>options</th>
                        <td>
                            <a class="btn btn-success btn-sm " href="https://wa.me/{{ $order->order->phone }}?text=Order ID : {{ $order->order->order_number }} It was charged on the way & Driver : {{ $driver->name }}"><i class="fab fa-whatsapp"></i></a>
                            <a class="btn btn-info btn-sm " href="tel:+{{ $order->order->phone }}"><i class="fa fa-phone"></i></a>
                            <form style="display: inline-block" action="{{ route('driverorders.update', $order->id) }}?type=done" method="post">
                                @csrf 
                                @method('PUT')
                                <button class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>
                            </form>
                            <form style="display: inline-block" action="{{ route('driverorders.update', $order->id) }}?type=schedule" method="post">
                                @csrf 
                                @method('PUT')
                                <button class="btn btn-dark btn-sm"><i class="fa fa-clock"></i></button>
                            </form>
                            <form style="display: inline-block" action="{{ route('driverorders.update', $order->id) }}?type=cancel" method="post">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        @endforeach
    </div>
</div>



@endsection