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
                <label for="crane_id">{{ trans('cruds.rental.fields.crane') }}</label>
                <select class="form-control select2 {{ $errors->has('crane') ? 'is-invalid' : '' }}" name="crane_id" id="crane_id">
                    @foreach($cranes as $id => $entry)
                        <option value="{{ $id }}" {{ old('crane_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('crane'))
                    <div class="invalid-feedback">
                        {{ $errors->first('crane') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rental.fields.crane_helper') }}</span>
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
                <label for="hp">{{ trans('cruds.rental.fields.hp') }}</label>
                <input class="form-control {{ $errors->has('hp') ? 'is-invalid' : '' }}" type="number" name="hp" id="hp" value="{{ old('hp', '0') }}" step="1">
                @if($errors->has('hp'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hp') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rental.fields.hp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lw">{{ trans('cruds.rental.fields.lw') }}</label>
                <input class="form-control {{ $errors->has('lw') ? 'is-invalid' : '' }}" type="number" name="lw" id="lw" value="{{ old('lw', '') }}" step="1">
                @if($errors->has('lw'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lw') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rental.fields.lw_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lifting_capacity">{{ trans('cruds.rental.fields.lifting_capacity') }}</label>
                <input class="form-control {{ $errors->has('lifting_capacity') ? 'is-invalid' : '' }}" type="number" name="lifting_capacity" id="lifting_capacity" value="{{ old('lifting_capacity', '') }}" step="0.01">
                @if($errors->has('lifting_capacity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lifting_capacity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rental.fields.lifting_capacity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="power">{{ trans('cruds.rental.fields.power') }}</label>
                <input class="form-control {{ $errors->has('power') ? 'is-invalid' : '' }}" type="number" name="power" id="power" value="{{ old('power', '') }}" step="1">
                @if($errors->has('power'))
                    <div class="invalid-feedback">
                        {{ $errors->first('power') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rental.fields.power_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="anchor">{{ trans('cruds.rental.fields.anchor') }}</label>
                <input class="form-control {{ $errors->has('anchor') ? 'is-invalid' : '' }}" type="text" name="anchor" id="anchor" value="{{ old('anchor', '') }}">
                @if($errors->has('anchor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('anchor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rental.fields.anchor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cross">{{ trans('cruds.rental.fields.cross') }}</label>
                <input class="form-control {{ $errors->has('cross') ? 'is-invalid' : '' }}" type="text" name="cross" id="cross" value="{{ old('cross', '') }}">
                @if($errors->has('cross'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cross') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rental.fields.cross_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="foundation_level">{{ trans('cruds.rental.fields.foundation_level') }}</label>
                <input class="form-control {{ $errors->has('foundation_level') ? 'is-invalid' : '' }}" type="number" name="foundation_level" id="foundation_level" value="{{ old('foundation_level', '') }}" step="1">
                @if($errors->has('foundation_level'))
                    <div class="invalid-feedback">
                        {{ $errors->first('foundation_level') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rental.fields.foundation_level_helper') }}</span>
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