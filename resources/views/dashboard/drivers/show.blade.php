@extends('layouts.dashboard.app', ['datatable' => true])

@section('title')
    المندوب | {{ $driver->name }}
@endsection

@section('content')
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>#</th>
                    <td>{{ $driver->id }}</td>
                </tr>
                <tr>
                    <th>الاسم</th>
                    <td>{{ $driver->name }}</td>
                </tr>
                <tr>
                    <th>رقم الهاتف</th>
                    <td>{{ $driver->phone }}</td>
                </tr>
                <tr>
                    <th>نوع العربة</th>
                    <td>{{ $driver->car }}</td>
                </tr>
                <tr>
                    <th>المرتب</th>
                    <td>{{ $driver->salary ? $driver->salary : '-'  }}</td>
                </tr>
                <tr>
                    <th>النسبة</th>
                    <td>{{ $driver->commission ? $driver->commission : '-' }}</td>
                </tr>
                <tr>
                    <th>عدد الطلبات</th>
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
        <h3 class="card-title">الطلبات</h3>
    </div>
    <div class="card-body">
        @foreach ($orders as $order)
            <table style="margin-bottom:3%;" class="table table-bordered table-striped text-center">
                <tbody>
                    <tr>
                        <th>رقم الطلب</th>
                        <td>{{ $order->order->order_number }}</td>
                    </tr>
                    {{-- <tr>
                        <th>Customer</th>
                        <td id="customer">{{ $order->order->customer }}</td>
                    </tr> --}}
                    <tr>
                        <th>رقم هاتف العميل</th>
                        <td id="phone">{{ $order->order->phone }}</td>
                    </tr>
                    <tr>
                        <th>عنوان الاستلام</th>
                        <td id="address">{{ $order->order->address }}</td>
                    </tr>
                    {{-- <tr>
                        <th>عنوان التسليم</th>
                        <td id="receiver">{{ $order->order->receiver }}</td>
                    </tr> --}}
                    <tr>
                        <th>رقم هاتف المستلم </th>
                        <td id="receiver_phone">{{ $order->order->receiver_phone }}</td>
                    </tr>
                    <tr>
                        <th>عنوان التسليم </th>
                        <td id="receiver_address">{{ $order->order->receiver_address }}</td>
                    </tr>
                    <tr>
                        <th>القيمة</th>
                        <td id="amount">{{ $order->order->amount }}</td>
                    </tr>
                    <tr>
                        <th>حالة الدفع</th>
                        <td id="pyment">{{ $order->order->pyment_status ? 'تم الدفع' : 'لم يتم الدفع' }}</td>
                    </tr>
                    <tr>
                        <th>تفاصيل الطلب</th>
                        <td id="description">{{ $order->order->description }}</td>
                    </tr>
                    <tr>
                        <th>قيمة التوصيل </th>
                        <td id="delivery_amount">{{ $order->order->delivery_amount }}</td>
                    </tr>
                    <tr>
                        <th>خيارات</th>
                        <td>
                            <a class="btn btn-success btn-sm " href="https://wa.me/{{ $order->order->phone }}?text=Order ID : {{ $order->order->order_number }} It was charged on the way & Driver : {{ $driver->name }}"><i class="fab fa-whatsapp"></i></a>
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
        @endforeach
    </div>
</div>



@endsection