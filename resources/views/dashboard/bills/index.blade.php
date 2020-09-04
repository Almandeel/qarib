@extends('layouts.dashboard.app', ['datatable' => true])

@section('title')
    الفواتير
@endsection

@section('content')
    {{-- @component('partials._breadcrumb')
        @slot('title', ['markets'])
        @slot('url', ['#'])
        @slot('icon', ['markets'])
    @endcomponent --}}
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary btn-xs order float-right" data-toggle="modal" data-target="#OrderWarehouseModal" ><i class="fa fa-car"></i> اضافة طلبات لمندوب </button>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>رقم الفتورة</th>
                        @if($type == 'warehouses')
                            <th>Market</th>
                            <th>Warehouse</th>
                        @else 
                            <th>مندوب التوصيل</th>
                        @endif
                        <th>عدد الطلبات</th>
                        <th>قيمة الطلبات</th>
                        <th>التاريخ</th>
                        <th>خيارات</th>
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
                                    <a href="{{ route('bills.show', $bill->id) }}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i> عرض</a>
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
