@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.raport.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.raports.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.raport.fields.id') }}
                        </th>
                        <td>
                            {{ $raport->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.raport.fields.crane_sn') }}
                        </th>
                        <td>
                            {{ $raport->crane_sn->sn ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.raport.fields.data') }}
                        </th>
                        <td>
                            {{ $raport->data }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.raport.fields.start') }}
                        </th>
                        <td>
                            {{ $raport->start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.raport.fields.stop') }}
                        </th>
                        <td>
                            {{ $raport->stop }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.raport.fields.work') }}
                        </th>
                        <td>
                            {{ $raport->work }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.raport.fields.engine') }}
                        </th>
                        <td>
                            {{ $raport->engine }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.raport.fields.gps_kraj') }}
                        </th>
                        <td>
                            {{ $raport->gps_kraj }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.raport.fields.gps_woj') }}
                        </th>
                        <td>
                            {{ $raport->gps_woj }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.raport.fields.gps_city') }}
                        </th>
                        <td>
                            {{ $raport->gps_city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.raport.fields.gps_ulica') }}
                        </th>
                        <td>
                            {{ $raport->gps_ulica }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.raports.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection