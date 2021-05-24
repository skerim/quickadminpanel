@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.maintenance.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.maintenances.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="crane_id">{{ trans('cruds.maintenance.fields.crane') }}</label>
                <select class="form-control select2 {{ $errors->has('crane') ? 'is-invalid' : '' }}" name="crane_id" id="crane_id" required>
                    @foreach($cranes as $id => $entry)
                        <option value="{{ $id }}" {{ old('crane_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('crane'))
                    <div class="invalid-feedback">
                        {{ $errors->first('crane') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.maintenance.fields.crane_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_id">{{ trans('cruds.maintenance.fields.project') }}</label>
                <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}" name="project_id" id="project_id">
                    @foreach($projects as $id => $entry)
                        <option value="{{ $id }}" {{ old('project_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('project'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.maintenance.fields.project_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="maintenance_data">{{ trans('cruds.maintenance.fields.maintenance_data') }}</label>
                <input class="form-control date {{ $errors->has('maintenance_data') ? 'is-invalid' : '' }}" type="text" name="maintenance_data" id="maintenance_data" value="{{ old('maintenance_data') }}" required>
                @if($errors->has('maintenance_data'))
                    <div class="invalid-feedback">
                        {{ $errors->first('maintenance_data') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.maintenance.fields.maintenance_data_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="conservator_id">{{ trans('cruds.maintenance.fields.conservator') }}</label>
                <select class="form-control select2 {{ $errors->has('conservator') ? 'is-invalid' : '' }}" name="conservator_id" id="conservator_id">
                    @foreach($conservators as $id => $entry)
                        <option value="{{ $id }}" {{ old('conservator_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('conservator'))
                    <div class="invalid-feedback">
                        {{ $errors->first('conservator') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.maintenance.fields.conservator_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection