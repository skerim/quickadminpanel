@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.rental.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.rentals.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="cranes">{{ trans('cruds.rental.fields.crane') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('cranes') ? 'is-invalid' : '' }}" name="cranes[]" id="cranes" multiple required>
                    @foreach($cranes as $id => $crane)
                        <option value="{{ $id }}" {{ in_array($id, old('cranes', [])) ? 'selected' : '' }}>{{ $crane }}</option>
                    @endforeach
                </select>
                @if($errors->has('cranes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cranes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rental.fields.crane_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="project_id">{{ trans('cruds.rental.fields.project') }}</label>
                <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}" name="project_id" id="project_id" required>
                    @foreach($projects as $id => $entry)
                        <option value="{{ $id }}" {{ old('project_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('project'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rental.fields.project_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rental_start">{{ trans('cruds.rental.fields.rental_start') }}</label>
                <input class="form-control date {{ $errors->has('rental_start') ? 'is-invalid' : '' }}" type="text" name="rental_start" id="rental_start" value="{{ old('rental_start') }}">
                @if($errors->has('rental_start'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rental_start') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rental.fields.rental_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rental_end">{{ trans('cruds.rental.fields.rental_end') }}</label>
                <input class="form-control date {{ $errors->has('rental_end') ? 'is-invalid' : '' }}" type="text" name="rental_end" id="rental_end" value="{{ old('rental_end') }}">
                @if($errors->has('rental_end'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rental_end') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rental.fields.rental_end_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name_crane">{{ trans('cruds.rental.fields.name_crane') }}</label>
                <input class="form-control {{ $errors->has('name_crane') ? 'is-invalid' : '' }}" type="text" name="name_crane" id="name_crane" value="{{ old('name_crane', '') }}">
                @if($errors->has('name_crane'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_crane') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rental.fields.name_crane_helper') }}</span>
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