@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.liny.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.linies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.liny.fields.id') }}
                        </th>
                        <td>
                            {{ $liny->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.liny.fields.diameter') }}
                        </th>
                        <td>
                            {{ $liny->diameter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.liny.fields.dostawca') }}
                        </th>
                        <td>
                            {{ $liny->dostawca }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.liny.fields.crane') }}
                        </th>
                        <td>
                            {{ $liny->crane->sn ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.liny.fields.length') }}
                        </th>
                        <td>
                            {{ $liny->length }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.liny.fields.certificate') }}
                        </th>
                        <td>
                            {{ $liny->certificate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.liny.fields.certificate_file') }}
                        </th>
                        <td>
                            @if($liny->certificate_file)
                                <a href="{{ $liny->certificate_file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.liny.fields.stan') }}
                        </th>
                        <td>
                            {{ $liny->stan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.liny.fields.comments') }}
                        </th>
                        <td>
                            {{ $liny->comments }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.linies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection