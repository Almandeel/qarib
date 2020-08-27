@extends('layouts.dashboard.app', ['datatable' => true])

@section('title')
    Drivers
@endsection

@section('content')
    {{-- @component('partials._breadcrumb')
        @slot('title', ['drivers'])
        @slot('url', ['#'])
        @slot('icon', ['drivers'])
    @endcomponent --}}
    <div class="card">
        <div class="card-header">
            @permission('drivers-create')
                <button style="display:inline-block; margin-left:1%" type="button" class="btn btn-primary btn-sm pull-left" data-toggle="modal" data-target="#DriversModal">
                    <i class="fa fa-plus"> add</i>
                </button>
            @endpermission
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>phone</th>
                        <th>address</th>
                        <th>options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($drivers as $driver)
                        <tr>
                            <td>{{ $driver->name }}</td>
                            <td>{{ $driver->phone }}</td>
                            <td>{{ $driver->address }}</td>
                            <td>
                                @permission('drivers-read')
                                    <a href="{{ route('drivers.show', $driver->id) }}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i> Show</a>
                                @endpermission

                                @permission('drivers-update')
                                <a class="btn btn-warning btn-xs driver update" data-toggle="modal" data-target="#DriversModal" data-action="{{ route('drivers.update', $driver->id) }}"  data-name="{{ $driver->name }}" data-email="{{ $driver->email }}" data-phone="{{ $driver->phone }}" data-address="{{ $driver->address }}" data-car="{{ $driver->car }}" data-salary="{{ $driver->salary }}" data-commission="{{ $driver->commission }}" data-max-orders="{{ $driver->max_orders }}" ><i class="fa fa-edit"></i> Edit </a>
                                @endpermission

                                {{-- @permission('drivers-delete')
                                    <form style="display:inline-block" action="{{ route('drivers.destroy', $driver->id) }}?type=status" method="post">
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


@include('dashboard.modals.driver')
@endsection
