@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.rental.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rentals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.rental.fields.id') }}
                        </th>
                        <td>
                            {{ $rental->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rental.fields.crane') }}
                        </th>
                        <td>
                            @foreach($rental->cranes as $key => $crane)
                                <span class="label label-info">{{ $crane->sn }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rental.fields.project') }}
                        </th>
                        <td>
                            {{ $rental->project->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rental.fields.rental_start') }}
                        </th>
                        <td>
                            {{ $rental->rental_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rental.fields.rental_end') }}
                        </th>
                        <td>
                            {{ $rental->rental_end }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rental.fields.name_crane') }}
                        </th>
                        <td>
                            {{ $rental->name_crane }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rentals.index') }}">
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
            <a class="nav-link" href="#rental_projects" role="tab" data-toggle="tab">
                {{ trans('cruds.project.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="rental_projects">
            @includeIf('admin.rentals.relationships.rentalProjects', ['projects' => $rental->rentalProjects])
        </div>
    </div>
</div>

@endsection