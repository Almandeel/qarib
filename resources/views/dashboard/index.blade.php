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
                        <span class="info-box-text">@lang('global.orders')</span>
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
                        <span class="info-box-text">@lang('global.drivers')</span>
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
                        <span class="info-box-text">@lang('global.markets')</span>
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
                        <span class="info-box-text">@lang('global.users')</span>
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
                            <h3 class="card-title">@lang('orders.list')</h3>

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
                                            <th>@lang('orders.id')</th>
                                            <th>المتجر</th>
                                            <th>@lang('global.address')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $order->order_number }}</td>
                                                <td>{{ $order->market->name ?? __('global.customer_services') }}</td>
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
                            <a href="{{ route('orders.index') }}" class="btn btn-sm btn-secondary float-right">@lang('global.all')
                                @lang('global.orders')</a>
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
                        <span class="info-box-text">@lang('bills.open')</span>
                        <span class="info-box-number">{{ $all_open_bills }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box mb-3 bg-success">
                    <span class="info-box-icon"><i class="fa fa-file"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">@lang('bills.cloce')</span>
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
                                        <label>@lang('orders.search')</label>
                                        <form action="{{ route('dashboard.index') }}" method="get">
                                            <div class="input-group ">
                                                <input type="text" required class="form-control" name="order_id" placeholder="Order ID" aria-label="Order ID" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button type="submit" class="input-group-text" id="basic-addon2">@lang('global.search')</button>
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
                                                    <th>@lang('orders.id')</th>
                                                    <td>{{ $search_order->order_number }}</td>
                                                </tr>
                                                <tr>
                                                    <th>اسم العميل</th>
                                                    <td id="customer">{{ $search_order->customer }}</td>
                                                </tr>
                                                <tr>
                                                    <th>رقم العميل</th>
                                                    <td id="phone">{{ $search_order->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <th>عنوان  الاستلام</th>
                                                    <td id="address">{{ $search_order->address }}</td>
                                                </tr>
                                                <tr>
                                                    <th>اسم المستلم</th>
                                                    <td id="receiver">{{ $search_order->receiver }}</td>
                                                </tr>
                                                <tr>
                                                    <th>رقم المستلم</th>
                                                    <td id="receiver_phone">{{ $search_order->receiver_phone }}</td>
                                                </tr>
                                                <tr>
                                                    <th>عنوان الاستلام</th>
                                                    <td id="receiver_address">{{ $search_order->receiver_address }}</td>
                                                </tr>
                                                <tr>
                                                    <th>قيمة الطلب</th>
                                                    <td id="amount">{{ $search_order->amount }}</td>
                                                </tr>
                                                <tr>
                                                    <th>حالة الدفع</th>
                                                    <td id="pyment">{{ $search_order->pyment_status ? 'Pay' : 'Non pay' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>قيمة التوصيل</th>
                                                    <td id="delivery_amount">{{ $search_order->delivery_amount }}</td>
                                                </tr>
                                                <tr>
                                                    <th>تفاصيل الطلب</th>
                                                    <td id="description">{{ $search_order->description }}</td>
                                                </tr>
                                                <tr>
                                                    <th>الحالة</th>
                                                    <td>
                                                        @if($search_order->status == \App\Order::$status_accepted)
                                                            تمت الموافقة
                                                        @endif 
    
                                                        @if($search_order->status == \App\Order::$status_in_drivers)
                                                            في الطريق
                                                        @endif 
                                                        @if($search_order->status == \App\Order::$status_done)
                                                            تم التوصيل
                                                        @endif
    
                                                        @if($search_order->status == \App\Order::$status_default)
                                                            في المتجر
                                                        @endif
    
                                                        @if($search_order->status == \App\Order::$status_cancel)
                                                            تم الغاء الطلب
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>مندوبى التوصيل</th>
                                                    <td>{{ $search_order->driverOrders->last()->driver->name ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>تم التوصيل في</th>
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
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                    <a class="info-box-icon bg-info elevation-1"r href="{{ route('drivers.show',auth()->user()->driver_id ) }}"><span ><i class="fas fa-list"></i></span></a>
                    <div class="info-box-content">
                        <span class="info-box-text"> كل الطلبات </span>
                        <span class="info-box-number">
                            {{ count(auth()->user()->driver->bills->last()->billOrders) }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            {{-- <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                    <a class="info-box-icon bg-info elevation-1"r href="{{ route('drivers.show',auth()->user()->driver_id ) }}"><span ><i class="fas fa-list"></i></span></a>
                    <div class="info-box-content">
                        <span class="info-box-text"> الطلبات التامة </span>
                        <span class="info-box-number">
                            {{ count(auth()->user()->driver->bills->last()->billOrders->where('status', 3)) }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                    <a class="info-box-icon bg-info elevation-1"r href="{{ route('drivers.show',auth()->user()->driver_id ) }}"><span ><i class="fas fa-list"></i></span></a>
                    <div class="info-box-content">
                        <span class="info-box-text"> الطلبات الملغية </span>
                        <span class="info-box-number">
                            {{ count(auth()->user()->driver->bills->last()->billOrders->where('status', 5)) }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div> --}}
        </div>
        <div class="row">
            @foreach (auth()->user()->driver->orders->where('status', 0) as $order)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">الطلبات</h3>
                        </div>
                        <div class="card-body">
                            <table style="margin-bottom:3%;" class="table table-bordered table-striped ">
                                <tbody>
                                    <tr>
                                        <th>رقم الطلب</th>
                                        <td>{{ $order->order->order_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>اسم العميل</th>
                                        <td id="customer">{{ $order->order->customer }}</td>
                                    </tr>
                                    <tr>
                                        <th>رقم العميل</th>
                                        <td id="phone">{{ $order->order->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>عنوان الاستلام</th>
                                        <td id="address">{{ $order->order->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>اسم المستلم</th>
                                        <td id="receiver">{{ $order->order->receiver }}</td>
                                    </tr>
                                    <tr>
                                        <th>رقم المستلم</th>
                                        <td id="receiver_phone">{{ $order->order->receiver_phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>عنوان التسليم</th>
                                        <td id="receiver_address">{{ $order->order->receiver_address }}</td>
                                    </tr>
                                    <tr>
                                        <th>قيمة الطلب</th>
                                        <td id="amount">{{ $order->order->amount }}</td>
                                    </tr>
                                    <tr>
                                        <th>حالة الدفع </th>
                                        <td id="pyment">{{ $order->order->pyment_status ? 'Pay' : 'Non pay' }}</td>
                                    </tr>
                                    <tr>
                                        <th>قيمة التوصيل </th>
                                        <td id="delivery_amount">{{ $order->order->delivery_amount }}</td>
                                    </tr>
                                    <tr>
                                        <th>تفاصيل الطلب</th>
                                        <td id="description">{{ $order->order->description }}</td>
                                    </tr>
                                    <tr>
                                        <th>خيارات</th>
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
