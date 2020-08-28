@extends('layouts.dashboard.app', ['datatable' => true])

@section('title')
    orders
@endsection

@section('content')
<div class="card">
  <div class="card-header">
      <h3 class="card-title">Orders List </h3>
      {{-- <button class="btn btn-success btn-xs order float-right order" data-toggle="modal" data-target="#orderModal"><i class="fa fa-check"> Bill Receved </i></button> --}}
      <button class="btn btn-primary btn-xs order float-right order" style="margin: 0 2%" data-toggle="modal" data-target="#addOrderModal"  ><i class="fa fa-list"></i> Add Orders </button>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
      <table id="datatable" class="table table-bordered table-striped text-center">
          <thead>
              <tr>
                  <th>Order ID</th>
                  <th>Market</th>
                  <th>Address</th>
                  <th>Options</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)
              <tr>
                  <td>{{ $order->order_number }}</td>
                  <td>{{ $order->market->name }}</td>
                  <td><span>{{ $order->address }}</span></td>
                  <td>
                      <form style="display: inline-block" action="{{ route('orders.update', $order->id) }}?type=accepted" method="post">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-success btn-xs"><i class="fa fa-closed-captioning"> Accepted </i></button>
                      </form>
                      <form style="display: inline-block" action="{{ route('orders.destroy', $order->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-xs delete"><i class="fa fa-closed-captioning"> Cancel </i></button>
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
