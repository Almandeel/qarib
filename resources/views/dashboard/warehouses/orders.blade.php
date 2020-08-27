@extends('layouts.dashboard.app', ['datatable' => true])

@section('title')
    Warehouses | {{ $warehouse->name }}
@endsection

@section('content')
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>name</th>
                    <td>{{ $warehouse->name }}</td>
                </tr>
            </thead>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>


<div class="card">
    <div class="card-header">
        <h3 class="card-title">Orders List</h3>
        <button class="btn btn-primary btn-xs order float-right" data-toggle="modal" data-target="#OrderWarehouseModal" data-warehouse="{{ $warehouse->id }}" ><i class="fa fa-car"></i> Driver </button>
        <button class="btn btn-primary btn-xs order float-right order" style="margin: 0 2%" data-toggle="modal" data-target="#addOrderModal" data-warehouse_id="{{ $warehouse->id }}" ><i class="fa fa-list"></i> Add Orders </button>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Market</th>
                    <th>Address</th>
                    <th>Driver</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($warehouse->warehouseOrders->whereIn('status', [0, 1]) as $index=>$warehouseOrder)
                    <tr>
                        <td>{{ $warehouseOrder->order->order_number }}</td>
                        <td>{{ $warehouseOrder->order->market->name ?? 'Customer Services' }}</td>
                        <td><span>{{ $warehouseOrder->order->address }}</span></td>
                        <td>{{ $warehouseOrder->order->driverOrders->last()->driver->name ?? '' }}</td>
                        <td>
                            <button class="btn btn-default btn-xs show-order" 
                            data-id="{{ $warehouseOrder->order->id }}" 
                            data-receiver="{{ $warehouseOrder->order->receiver }}" 
                            data-receiver_phone="{{ $warehouseOrder->order->receiver_phone }}" 
                            data-receiver_address="{{ $warehouseOrder->order->receiver_address }}" 
                            data-address="{{ $warehouseOrder->order->address }}" 
                            data-customer="{{ $warehouseOrder->order->customer }}" 
                            data-phone="{{ $warehouseOrder->order->phone }}" 
                            data-amount="{{ $warehouseOrder->order->amount }}" 
                            data-pyment="{{ $warehouseOrder->order->pyment_status }}" 
                            data-market="{{ $warehouseOrder->order->market->name ?? 'Customer Services' }}" 
                            data-market="{{ $warehouseOrder->order->description }}" 
                            data-delivery_amount="{{ $warehouseOrder->order->delivery_amount }}"
                            data-toggle="modal" data-target="#showOrderModal" ><i class="fa fa-eye"></i> Show </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('dashboard.modals.order-warehouse')
@include('dashboard.modals.show-order')
@include('dashboard.modals.add_order')
@include('partials._select2')
@endsection



{{-- 

    @if($warehouseOrder->status == 0)
                            <td>
                                <span class="text-default">in Warehouse</span>
                            </td>
                            <td></td>
                            <td>
                                <button class="btn btn-default btn-xs show-order" data-id="{{ $warehouseOrder->order->id }}" data-customer="{{ $warehouseOrder->order->customer }}" data-address="{{ $warehouseOrder->order->address }}" data-address="{{ $warehouseOrder->order->address }}" data-phone="{{ $warehouseOrder->order->phone }}" data-amount="{{ $warehouseOrder->order->amount }}" data-pyment="{{ $warehouseOrder->order->pyment_status }}" data-market="{{ $warehouseOrder->order->market->name }}" data-toggle="modal" data-target="#showOrderModal" ><i class="fa fa-eye"></i> Show </button>
                                {{-- <button class="btn btn-danger btn-xs"><i class="fa fa-times"></i> cancel</button> 
                            </td>
                            @elseif($warehouseOrder->status == 1)
                                <td>
                                    <span class="{{ $warehouseOrder->order->status == 2 ? 'text-warning' : 'text-success'  }}">in Driver</span>
                                </td>
                                <td>{{ $warehouseOrder->order->driverOrders->driver->name ?? '' }}</td>
                                <td>
                                    <button class="btn btn-default btn-xs show-order" data-id="{{ $warehouseOrder->order->id }}" data-customer="{{ $warehouseOrder->order->customer }}" data-address="{{ $warehouseOrder->order->address }}" data-address="{{ $warehouseOrder->order->address }}" data-phone="{{ $warehouseOrder->order->phone }}" data-amount="{{ $warehouseOrder->order->amount }}" data-pyment="{{ $warehouseOrder->order->pyment_status }}" data-market="{{ $warehouseOrder->order->market->name }}" data-toggle="modal" data-target="#showOrderModal" ><i class="fa fa-eye"></i> Show </button>
                                    @if($warehouseOrder->order->status == 1)
                                        <form style="display: inline-block" action="{{ route('warehouseorders.update', $warehouseOrder->id) }}?type=warehouse" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-success btn-xs order" ><i class="fa fa-check"> Return </i></button>
                                        </form>
                                    @elseif($warehouseOrder->order->status == 5)
                                        <form style="display: inline-block" action="{{ route('warehouseorders.update', $warehouseOrder->id) }}?type=cancel" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-success btn-xs order" ><i class="fa fa-check"> Cancel </i></button>
                                        </form>
                                    @else
                                        <form style="display: inline-block" action="{{ route('warehouseorders.update', $warehouseOrder->id) }}?type=receved" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-success btn-xs order" ><i class="fa fa-check"> Receved </i></button>
                                        </form>
                                    @endif
                                </td>
                            @else 
                                <td>
                                    <span class="text-success">in Customer</span>
                                </td>
                                <td>{{ $warehouseOrder->order->driverOrders->driver->name ?? ''  }}</td>
                                
                            @endif
--}}