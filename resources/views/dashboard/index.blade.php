@extends('layouts.dashboard.app')
@section('title')
    الرئيسية
@endsection
@section('content')

<!-- Main content -->
@role('superadmin')
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-list"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Orders </span>
                        <span class="info-box-number">
                            {{ $all_orders }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-truck"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Drivers</span>
                        <span class="info-box-number">{{ $all_drivers }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-home"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Market</span>
                        <span class="info-box-number">{{ $all_markets }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Users</span>
                        <span class="info-box-number">{{ $all_users }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            @permission('orders-read')
                <div class="col-md-8">
                    <!-- TABLE: LATEST ORDERS -->
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Latest Orders</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Market</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $order->order_number }}</td>
                                                <td>{{ $order->market->name ?? 'Customer Services' }}</td>
                                                <td><span>{{ $order->address }}</span></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New
                                Order</a> --}}
                            @permission('orders-read')
                            <a href="{{ route('orders.index') }}" class="btn btn-sm btn-secondary float-right">View All
                                Orders</a>
                            @endpermission
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
            @endpermission
            <!-- /.col -->
            @permission('bills-read')
            <div class="col-md-4">
                <!-- Info Boxes Style 2 -->
                <div class="info-box mb-3 bg-warning">
                    <span class="info-box-icon"><i class="fas fa-tag"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Open Bills</span>
                        <span class="info-box-number">{{ $all_open_bills }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box mb-3 bg-success">
                    <span class="info-box-icon"><i class="fa fa-file"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Cloced Bills </span>
                        <span class="info-box-number">{{ $all_cloced_bills }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.card -->
            </div>
            @endpermission


            @permission('orders-read')
                    <div class="col-md-12">
                        <!-- TABLE: LATEST ORDERS -->
                        <div class="card">
                            <div class="card-header border-transparent">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Search Order</label>
                                        <form action="{{ route('dashboard.index') }}" method="get">
                                            <div class="input-group ">
                                                <input type="text" required class="form-control" name="order_id" placeholder="Order ID" aria-label="Order ID" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button type="submit" class="input-group-text" id="basic-addon2">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    @isset($search_order)
                                        <table id="datatable" class="table table-bordered table-striped text-center">
                                            <tbody>
                                                <tr>
                                                    <th>Order ID</th>
                                                    <td>{{ $search_order->order_number }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Customer</th>
                                                    <td id="customer">{{ $search_order->customer }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Phone</th>
                                                    <td id="phone">{{ $search_order->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td id="address">{{ $search_order->address }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Receiver</th>
                                                    <td id="receiver">{{ $search_order->receiver }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Receiver Phone</th>
                                                    <td id="receiver_phone">{{ $search_order->receiver_phone }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Receiver Address</th>
                                                    <td id="receiver_address">{{ $search_order->receiver_address }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Amount</th>
                                                    <td id="amount">{{ $search_order->amount }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Pyment Status</th>
                                                    <td id="pyment">{{ $search_order->pyment_status ? 'Pay' : 'Non pay' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Delivery amount</th>
                                                    <td id="delivery_amount">{{ $search_order->delivery_amount }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Description</th>
                                                    <td id="description">{{ $search_order->description }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>
                                                        @if($search_order->status == \App\Order::$status_accepted)
                                                            Accepted
                                                        @endif 
    
                                                        @if($search_order->status == \App\Order::$status_in_drivers)
                                                            In Driver
                                                        @endif 
                                                        @if($search_order->status == \App\Order::$status_done)
                                                            Delivered
                                                        @endif
    
                                                        @if($search_order->status == \App\Order::$status_default)
                                                            In Market
                                                        @endif
    
                                                        @if($search_order->status == \App\Order::$status_cancel)
                                                            Canceled
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>driver</th>
                                                    <td>{{ $search_order->driverOrders->last()->driver->name ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Delivered at</th>
                                                    <td>{{ $search_order->driverOrders->last()->updated_at->format('Y-m-d H:i') ?? '' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    @endisset
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                {{-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New
                                    Order</a> --}}
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
            @endpermission
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</section>
@endrole

@role('drivers')
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <a class="info-box-icon bg-info elevation-1"r href="{{ route('drivers.show',auth()->user()->driver_id ) }}"><span ><i class="fas fa-list"></i></span></a>
                    <div class="info-box-content">
                        <span class="info-box-text"> Orders </span>
                        <span class="info-box-number">
                            {{ count(auth()->user()->driver->orders->where('status', 0)) }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        <div class="row">
            @foreach (auth()->user()->driver->orders->where('status', 0) as $order)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Order</h3>
                        </div>
                        <div class="card-body">
                            <table style="margin-bottom:3%;" class="table table-bordered table-striped ">
                                <tbody>
                                    <tr>
                                        <th>Order ID</th>
                                        <td>{{ $order->order->order_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Customer</th>
                                        <td id="customer">{{ $order->order->customer }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td id="phone">{{ $order->order->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td id="address">{{ $order->order->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Receiver</th>
                                        <td id="receiver">{{ $order->order->receiver }}</td>
                                    </tr>
                                    <tr>
                                        <th>Receiver Phone</th>
                                        <td id="receiver_phone">{{ $order->order->receiver_phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Receiver Address</th>
                                        <td id="receiver_address">{{ $order->order->receiver_address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Amount</th>
                                        <td id="amount">{{ $order->order->amount }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pyment Status</th>
                                        <td id="pyment">{{ $order->order->pyment_status ? 'Pay' : 'Non pay' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Delivery amount</th>
                                        <td id="delivery_amount">{{ $order->order->delivery_amount }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td id="description">{{ $order->order->description }}</td>
                                    </tr>
                                    <tr>
                                        <th>options</th>
                                        <td>
                                            <a class="btn btn-success btn-sm " href="https://wa.me/{{ $order->order->phone }}?text=Order ID : {{ $order->order->order_number }} It was charged on the way & Driver : {{ auth()->user()->driver->name }}"><i class="fab fa-whatsapp"></i></a>
                                            <a class="btn btn-info btn-sm " href="tel:+{{ $order->order->phone }}"><i class="fa fa-phone"></i></a>
                                            <form style="display: inline-block" action="{{ route('driverorders.update', $order->id) }}?type=done" method="post">
                                                @csrf 
                                                @method('PUT')
                                                <button class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>
                                            </form>
                                            {{-- <form style="display: inline-block" action="{{ route('driverorders.update', $order->id) }}?type=schedule" method="post">
                                                @csrf 
                                                @method('PUT')
                                                <button class="btn btn-dark btn-sm"><i class="fa fa-clock"></i></button>
                                            </form> --}}
                                            <form style="display: inline-block" action="{{ route('driverorders.update', $order->id) }}?type=cancel" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endrole

@role('market')
<section class="content">
    @include('dashboard.modals.market_orders')
</section>
@endrole
<!-- /.content -->

@endsection
