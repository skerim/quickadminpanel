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
                            {{ trans('cruds.crane.fields.producer') }}
                        </th>
                        <td>
                            {{ $crane->producer->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crane.fields.crane_class') }}
                        </th>
                        <td>
                            {{ $crane->crane_class->name ?? '' }}
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
                            {{ trans('cruds.crane.fields.year') }}
                        </th>
                        <td>
                            {{ $crane->year }}
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
                    <tr>
                        <th>
                            {{ trans('cruds.crane.fields.color') }}
                        </th>
                        <td>
                            {{ $crane->color }}
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
            <a class="nav-link" href="#crane_maintenances" role="tab" data-toggle="tab">
                {{ trans('cruds.maintenance.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#crane_rentals" role="tab" data-toggle="tab">
                {{ trans('cruds.rental.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#crane_sn_raports" role="tab" data-toggle="tab">
                {{ trans('cruds.raport.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#crane_linies" role="tab" data-toggle="tab">
                {{ trans('cruds.liny.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#crane_servis" role="tab" data-toggle="tab">
                {{ trans('cruds.servi.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="crane_maintenances">
            @includeIf('admin.cranes.relationships.craneMaintenances', ['maintenances' => $crane->craneMaintenances])
        </div>
        <div class="tab-pane" role="tabpanel" id="crane_rentals">
            @includeIf('admin.cranes.relationships.craneRentals', ['rentals' => $crane->craneRentals])
        </div>
        <div class="tab-pane" role="tabpanel" id="crane_sn_raports">
            @includeIf('admin.cranes.relationships.craneSnRaports', ['raports' => $crane->craneSnRaports])
        </div>
        <div class="tab-pane" role="tabpanel" id="crane_linies">
            @includeIf('admin.cranes.relationships.craneLinies', ['linies' => $crane->craneLinies])
        </div>
        <div class="tab-pane" role="tabpanel" id="crane_servis">
            @includeIf('admin.cranes.relationships.craneServis', ['servis' => $crane->craneServis])
        </div>
    </div>
</div>

@endsection