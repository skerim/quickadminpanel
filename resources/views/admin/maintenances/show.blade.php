@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.maintenance.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.maintenances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.maintenance.fields.id') }}
                        </th>
                        <td>
                            {{ $maintenance->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.maintenance.fields.crane') }}
                        </th>
                        <td>
                            {{ $maintenance->crane->sn ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.maintenance.fields.project') }}
                        </th>
                        <td>
                            {{ $maintenance->project->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.maintenance.fields.maintenance_data') }}
                        </th>
                        <td>
                            {{ $maintenance->maintenance_data }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.maintenance.fields.conservator') }}
                        </th>
                        <td>
                            {{ $maintenance->conservator->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.maintenance.fields.discription') }}
                        </th>
                        <td>
                            {{ $maintenance->discription }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.maintenances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection