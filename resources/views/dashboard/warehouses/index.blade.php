@extends('layouts.dashboard.app', ['datatable' => true])

@section('title')
    warehouses
@endsection

@section('content')
    {{-- @component('partials._breadcrumb')
        @slot('title', ['warehouses'])
        @slot('url', ['#'])
        @slot('icon', ['warehouses'])
    @endcomponent --}}
    <div class="card">
        <div class="card-header">
            @permission('warehouses-create')
                <button style="display:inline-block; margin-left:1%" type="button" class="btn btn-primary btn-sm pull-left" data-toggle="modal" data-target="#warehousesModal">
                    <i class="fa fa-plus"> add</i>
                </button>
            @endpermission
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($warehouses as $warehouse)
                        <tr>
                            <td>{{ $warehouse->name }}</td>
                            <td>
                                @permission('warehouses-read')
                                    <a class="btn btn-default btn-xs" href="{{ route('warehouses.orders', $warehouse->id) }}"><i class="fa fa-list"></i> Orders </a>
                                @endpermission
                                
                                @permission('warehouses-read')
                                    <a class="btn btn-info btn-xs" href="{{ route('warehouses.show', $warehouse->id) }}"><i class="fa fa-eye"></i> Show </a>
                                @endpermission

                                @permission('warehouses-update')
                                    <a class="btn btn-warning btn-xs warehouse  update" data-toggle="modal" data-target="#warehousesModal" data-action="{{ route('warehouses.update', $warehouse->id) }}" data-name="{{ $warehouse->name }}" ><i class="fa fa-edit"></i> Edit </a>
                                @endpermission

                                {{-- @permission('warehouses-delete')
                                    <form style="display:inline-block" action="{{ route('warehouses.destroy', $warehouse->id) }}?type=status" method="post">
                                        @csrf 
                                        @method('DELETE')
                                        <button class="btn btn-default btn-xs" type="submit"><i class="fa fa-edit"></i> Delete </a>
                                    </form>
                                @endpermission --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@include('dashboard.modals.warehouse')
@endsection
