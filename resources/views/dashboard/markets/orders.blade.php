@extends('layouts.dashboard.app', ['datatable' => true])

@section('title')
    Orders
@endsection

@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3>الطلبات</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="datatable" class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>رقم الطلب</th>
                        <th>رقم العميل</th>
                        <th>عنوان الاستلام</th>
                        <th>رقم المستلم</th>
                        <th>عنوان التسليم</th>
                        <th>قيمة الطلب</th>
                        <th>حالة الطلب</th>
                        <th>التاريخ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->order_number }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->receiver_phone }}</td>
                        <td>{{ $order->receiver_address }}</td>
                        <td>{{ $order->amount }}</td>
                        <td>
                            @if($order->status == \App\Order::$status_default)
                                جديد
                            @endif

                            @if($order->status == \App\Order::$status_accepted)
                             تمت الموافقة
                            @endif

                            @if($order->status == \App\Order::$status_cancel)
                                تم الالغاء
                            @endif

                            @if($order->status == \App\Order::$status_done)
                                تم التسليم
                            @endif

                            @if($order->status == \App\Order::$status_in_drivers)
                                في الطريق
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