@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.crane.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cranes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.crane.fields.id') }}
                        </th>
                        <td>
                            {{ $crane->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crane.fields.type') }}
                        </th>
                        <td>
                            {{ $crane->type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crane.fields.sn') }}
                        </th>
                        <td>
                            {{ $crane->sn }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crane.fields.producer') }}
                        </th>
                        <td>
                            {{ $crane->producer->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crane.fields.year') }}
                        </th>
                        <td>
                            {{ $crane->year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crane.fields.max_load') }}
                        </th>
                        <td>
                            {{ $crane->max_load }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crane.fields.udt') }}
                        </th>
                        <td>
                            {{ $crane->udt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crane.fields.enova') }}
                        </th>
                        <td>
                            {{ $crane->enova }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cranes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#crane_rentals" role="tab" data-toggle="tab">
                {{ trans('cruds.rental.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="crane_rentals">
            @includeIf('admin.cranes.relationships.craneRentals', ['rentals' => $crane->craneRentals])
        </div>
    </div>
</div>

@endsection