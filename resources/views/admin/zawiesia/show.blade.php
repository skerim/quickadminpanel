@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.zawiesium.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.zawiesia.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.zawiesium.fields.id') }}
                        </th>
                        <td>
                            {{ $zawiesium->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zawiesium.fields.nr') }}
                        </th>
                        <td>
                            {{ $zawiesium->nr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zawiesium.fields.klasa') }}
                        </th>
                        <td>
                            {{ $zawiesium->klasa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zawiesium.fields.expiration_date') }}
                        </th>
                        <td>
                            {{ $zawiesium->expiration_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zawiesium.fields.certificate_file') }}
                        </th>
                        <td>
                            @if($zawiesium->certificate_file)
                                <a href="{{ $zawiesium->certificate_file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zawiesium.fields.load') }}
                        </th>
                        <td>
                            {{ $zawiesium->load }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zawiesium.fields.length') }}
                        </th>
                        <td>
                            {{ $zawiesium->length }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zawiesium.fields.crane') }}
                        </th>
                        <td>
                            {{ $zawiesium->crane->sn ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zawiesium.fields.type') }}
                        </th>
                        <td>
                            {{ $zawiesium->type }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.zawiesia.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection