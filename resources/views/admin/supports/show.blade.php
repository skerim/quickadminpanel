@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.support.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.supports.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.support.fields.id') }}
                        </th>
                        <td>
                            {{ $support->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.support.fields.crane') }}
                        </th>
                        <td>
                            {{ $support->crane->sn ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.support.fields.budowa') }}
                        </th>
                        <td>
                            {{ $support->budowa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.support.fields.region') }}
                        </th>
                        <td>
                            {{ $support->region }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.support.fields.kontrahent') }}
                        </th>
                        <td>
                            {{ $support->kontrahent->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.support.fields.transport') }}
                        </th>
                        <td>
                            {{ $support->transport->transport ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.supports.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection