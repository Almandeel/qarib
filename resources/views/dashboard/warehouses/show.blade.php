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
                    <th>options</th>
                    <td>
                        @permission('warehouses-update')
                            <a class="btn btn-warning btn-xs warehouse  update" data-toggle="modal" data-target="#warehousesModal" data-action="{{ route('warehouses.update', $warehouse->id) }}" data-name="{{ $warehouse->name }}" ><i class="fa fa-edit"></i> Edit </a>
                        @endpermission
                    </td>
                </tr>
            </thead>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">users</h3>
        @permission('warehouses-update')
            <button class="btn btn-primary btn-xs user float-right" data-toggle="modal" data-target="#userModal" data-warehouse="{{ $warehouse->id }}" ><i class="fa fa-plus"></i> Add </button>
        @endpermission
    </div>
    <div class="card-body">
        <table style="margin-bottom:3%;" class="table table-bordered table-striped text-center">
            <tbody>
                <tr>
                    <td>#</td>
                    <th>name</th>
                    <th>options</th>
                </tr>
                <tr>
                    @foreach ($warehouse->warehouseUsers as $index=>$warehouseUser)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $warehouseUser->user->username }}</td>
                            <td>
                                <form action="{{ route('warehouseusers.destroy', $warehouseUser->id) }}" method="post">
                                    @csrf 
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger den-xs delete"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>


@include('dashboard.modals.warehouse')
@include('dashboard.modals.users')

@endsection