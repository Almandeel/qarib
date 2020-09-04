@extends('layouts.dashboard.app', ['datatable' => true])

@section('title')
    الطلبات
@endsection

@section('content')
<div class="card">
  <div class="card-header">
      <h3 class="card-title float-right">قائمة الطلبات </h3>
      {{-- <button class="btn btn-success btn-xs order float-right order" data-toggle="modal" data-target="#orderModal"><i class="fa fa-check"> Bill Receved </i></button> --}}
      <button class="btn btn-primary btn-xs order float-left order" style="margin: 0 2%" data-toggle="modal" data-target="#addOrderModal"  ><i class="fa fa-list"></i> اضافة طلب  </button>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
      <table id="datatable" class="table table-bordered table-striped text-center">
          <thead>
              <tr>
                  <th>رقم الطلب</th>
                  <th>رقم العميل</th>
                  <th>رقم المستلم</th>
                  <th>تفاصيل الطلب</th>
                  <th>خيارات</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)
              <tr>
                  <td>{{ $order->order_number }}</td>
                  <td>{{ $order->phone }}</td>
                  <td>{{ $order->receiver_phone }}</td>
                  <td>{{ $order->description }}</td>
                  <td>
                      @if($order->status == 0)
                        <form style="display: inline-block" action="{{ route('orders.update', $order->id) }}?type=accepted" method="post">
                          @csrf
                          @method('PUT')
                          <button class="btn btn-success btn-xs"><i class="fa fa-closed-captioning"> موافقة </i></button>
                        </form>
                      @endif

                      @if($order->status == 1)
                        <a class="btn btn-warning btn-xs" href="{{ route('orders.edit', $order->id) }}"><i class="fa fa-edit"></i> تعديل</a>
                      @endif

                      <form style="display: inline-block" action="{{ route('orders.destroy', $order->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-xs delete"><i class="fa fa-closed-captioning"> حذف </i></button>
                      </form>
                  </td>
              </tr>
            @endforeach
          </tbody>
      </table>
  </div>

  {{-- @include('dashboard.modals.warehouseOrder') --}}
  @include('dashboard.modals.show-order')
  @include('dashboard.modals.add_order')
  @include('partials._select2')


  @stack('select2')

</div>
@endsection
