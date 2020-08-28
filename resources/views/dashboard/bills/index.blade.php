@extends('layouts.dashboard.app', ['datatable' => true])

@section('title')
    Bills
@endsection

@section('content')
    {{-- @component('partials._breadcrumb')
        @slot('title', ['markets'])
        @slot('url', ['#'])
        @slot('icon', ['markets'])
    @endcomponent --}}
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary btn-xs order float-right" data-toggle="modal" data-target="#OrderWarehouseModal" ><i class="fa fa-car"></i> Driver </button>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>Number</th>
                        @if($type == 'warehouses')
                            <th>Market</th>
                            <th>Warehouse</th>
                        @else 
                            <th>Driver</th>
                        @endif
                        <th>Orders</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bills as $bill)
                        <tr>
                            <td>{{ $bill->id }}</td>
                            @if($type == 'warehouses')
                            <td>{{ $bill->market->name }}</td>
                            <td>{{ $bill->warehouse->name }}</td>
                            @else 
                                <td>{{ $bill->driver->name }}</td>
                            @endif
                            <td>{{ $bill->orders }}</td>
                            <td>{{ $bill->amount }}</td>
                            <td>{{ $bill->created_at->format('Y-m-d') }}</td>
                            <td>
                                @permission('bills-read')
                                    <a href="{{ route('bills.show', $bill->id) }}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i> Show</a>
                                @endpermission
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@include('dashboard.modals.market')
@include('dashboard.modals.order-warehouse')

@stack('select2')
@include('partials._select2')


@endsection
