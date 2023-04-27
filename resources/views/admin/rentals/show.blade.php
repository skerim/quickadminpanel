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
                            {{ trans('cruds.rental.fields.project') }}
                        </th>
                        <td>
                            {{ $rental->project->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rental.fields.crane') }}
                        </th>
                        <td>
                            {{ $rental->crane->sn ?? '' }}
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
                            {{ trans('cruds.rental.fields.hp') }}
                        </th>
                        <td>
                            {{ $rental->hp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rental.fields.lw') }}
                        </th>
                        <td>
                            {{ $rental->lw }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rental.fields.lifting_capacity') }}
                        </th>
                        <td>
                            {{ $rental->lifting_capacity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rental.fields.power') }}
                        </th>
                        <td>
                            {{ $rental->power }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rental.fields.anchor') }}
                        </th>
                        <td>
                            {{ $rental->anchor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rental.fields.cross') }}
                        </th>
                        <td>
                            {{ $rental->cross }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rental.fields.foundation_level') }}
                        </th>
                        <td>
                            {{ $rental->foundation_level }}
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