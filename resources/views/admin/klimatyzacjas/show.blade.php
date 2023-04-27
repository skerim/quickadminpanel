@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.klimatyzacja.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.klimatyzacjas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.klimatyzacja.fields.id') }}
                        </th>
                        <td>
                            {{ $klimatyzacja->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.klimatyzacja.fields.crane') }}
                        </th>
                        <td>
                            {{ $klimatyzacja->crane->sn ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.klimatyzacja.fields.model') }}
                        </th>
                        <td>
                            {{ $klimatyzacja->model }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.klimatyzacja.fields.data_montazu') }}
                        </th>
                        <td>
                            {{ $klimatyzacja->data_montazu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.klimatyzacja.fields.data_konserwacji') }}
                        </th>
                        <td>
                            {{ $klimatyzacja->data_konserwacji }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.klimatyzacja.fields.comments') }}
                        </th>
                        <td>
                            {{ $klimatyzacja->comments }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.klimatyzacjas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection