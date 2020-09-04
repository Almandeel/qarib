@extends('layouts.dashboard.app')

@section('title')
    تعديل طلب
@endsection

@section('content')
<section class="container">
    <div class="card">
        <div class="card-header">
            تعديل طلب رقم :  {{ $order->order_number }}
        </div>
        <form id="form_add_orders" action="{{ route('orders.update', $order->id) }}" method="post">
            <div class="card-body">
                @csrf 
                @method('PUT')
                <div class="">
                    <div class="orders">
                        <div class="form-group">
                            <label>قيمة الطلب </label>
                            <input type="number" class="form-control" name="amount" value="{{ $order->amount }}" placeholder="قيمة الطلب " required>
                        </div>
                        <div class="form-group">
                            <label>حالة دفع القيمة </label>
                            <select name="payment_status" class="form-control" required>
                                <option value="">الحالة </option>
                                <option value="1" {{ $order->payment_status == 1 ? 'selected' : '' }}>تم دفع القيمة</option>
                                <option value="0" {{ $order->payment_status == 0 ? 'selected' : '' }}>لم يتم الدفع </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>تفاصيل الطلب</label>
                            <input type="text" class="form-control" name="description" value="{{ $order->description }}" placeholder="تفاصيل الطلب " required>
                        </div>
                        <div class="form-group">
                            <label>قيمة التوصيل </label>
                            <input type="text" id="delivery_amount" class="form-control" value="{{ $order->delivery_amount }}" name="delivery_amount" placeholder="قيمة التوصيل " value="0" required>
                        </div>
                    </div>
                    <div class="address ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم هاتف العميل </label>
                                    <input type="number" class="form-control" name="phone" value="{{ $order->phone }}" placeholder="رقم هاتف العميل " required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> عنوان الاستلام</label>
                                    <input type="text" class="form-control" name="address" value="{{ $order->address }}" placeholder=" عنوان الاستلام " required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم هاتف المستلم </label>
                                    <input type="number" class="form-control" name="receiver_phone" value="{{ $order->receiver_phone }}" placeholder="رقم هاتف المستلم " required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>عنوان التسليم </label>
                                    <input type="text" class="form-control" name="receiver_address" value="{{ $order->receiver_address }}" placeholder="عنوان التسليم" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-4">
                        <div class="form-group">
                            <label>اسم العميل </label>
                            <input type="text" class="form-control" name="customer" placeholder="اسم العميل " required>
                        </div>
                    </div> --}}
                    
                    {{-- <div class="col-md-4">
                        <div class="form-group">
                            <label>اسم المستلم </label>
                            <input type="text" class="form-control" name="receiver" placeholder="اسم المستلم " required>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success ">حفظ</button>
            </div>
        </form>
    </div>
</section>
@endsection
