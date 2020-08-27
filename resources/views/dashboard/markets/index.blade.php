@extends('layouts.dashboard.app', ['datatable' => true])

@section('title')
    Markets
@endsection

@section('content')
    {{-- @component('partials._breadcrumb')
        @slot('title', ['markets'])
        @slot('url', ['#'])
        @slot('icon', ['markets'])
    @endcomponent --}}
    <div class="card">
        <div class="card-header">
            @permission('markets-create')
                <button style="display:inline-block; margin-left:1%" type="button" class="btn btn-primary btn-sm pull-left" data-toggle="modal" data-target="#MarketsModal">
                    <i class="fa fa-plus"> add</i>
                </button>
            @endpermission
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>email</th>
                        <th>cost</th>
                        <th>options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($markets as $market)
                        <tr>
                            <td>{{ $market->name }}</td>
                            <td>{{ $market->email }}</td>
                            <td>{{ $market->delivery_cost }}</td>
                            <td>
                                @permission('markets-update')
                                    <a class="btn btn-warning btn-xs market  update" data-toggle="modal" data-target="#MarketsModal" data-action="{{ route('markets.update', $market->id) }}" data-name="{{ $market->name }}" data-email="{{ $market->email }}" data-cost="{{ $market->delivery_cost }}" ><i class="fa fa-edit"></i> Edit </a>
                                @endpermission

                                {{-- @permission('markets-delete')
                                    <form style="display:inline-block" action="{{ route('markets.destroy', $market->id) }}?type=status" method="post">
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


@include('dashboard.modals.market')
@endsection
