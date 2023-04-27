@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.servi.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.servis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.servi.fields.id') }}
                        </th>
                        <td>
                            {{ $servi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.servi.fields.crane') }}
                        </th>
                        <td>
                            {{ $servi->crane->sn ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.servi.fields.project') }}
                        </th>
                        <td>
                            {{ $servi->project->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.servi.fields.conservator') }}
                        </th>
                        <td>
                            {{ $servi->conservator->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.servi.fields.discription') }}
                        </th>
                        <td>
                            {{ $servi->discription }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.servi.fields.status') }}
                        </th>
                        <td>
                            {{ $servi->status }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.servis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection