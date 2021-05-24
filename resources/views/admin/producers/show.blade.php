@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.producer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.producers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.producer.fields.id') }}
                        </th>
                        <td>
                            {{ $producer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.producer.fields.name') }}
                        </th>
                        <td>
                            {{ $producer->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.producer.fields.description') }}
                        </th>
                        <td>
                            {{ $producer->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.producers.index') }}">
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
            <a class="nav-link" href="#producer_cranes" role="tab" data-toggle="tab">
                {{ trans('cruds.crane.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="producer_cranes">
            @includeIf('admin.producers.relationships.producerCranes', ['cranes' => $producer->producerCranes])
        </div>
    </div>
</div>

@endsection