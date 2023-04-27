@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.task.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tasks.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.task.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="crane_type_id">{{ trans('cruds.task.fields.crane_type') }}</label>
                <select class="form-control select2 {{ $errors->has('crane_type') ? 'is-invalid' : '' }}" name="crane_type_id" id="crane_type_id" required>
                    @foreach($crane_types as $id => $entry)
                        <option value="{{ $id }}" {{ old('crane_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('crane_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('crane_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.crane_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="crane_id">{{ trans('cruds.task.fields.crane') }}</label>
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
                <span class="help-block">{{ trans('cruds.task.fields.crane_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status_id">{{ trans('cruds.task.fields.status') }}</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status_id" id="status_id" required>
                    @foreach($statuses as $id => $entry)
                        <option value="{{ $id }}" {{ old('status_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end">{{ trans('cruds.task.fields.end') }}</label>
                <input class="form-control date {{ $errors->has('end') ? 'is-invalid' : '' }}" type="text" name="end" id="end" value="{{ old('end') }}">
                @if($errors->has('end'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.end_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start">{{ trans('cruds.task.fields.start') }}</label>
                <input class="form-control date {{ $errors->has('start') ? 'is-invalid' : '' }}" type="text" name="start" id="start" value="{{ old('start') }}">
                @if($errors->has('start'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hp">{{ trans('cruds.task.fields.hp') }}</label>
                <input class="form-control {{ $errors->has('hp') ? 'is-invalid' : '' }}" type="text" name="hp" id="hp" value="{{ old('hp', '') }}">
                @if($errors->has('hp'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hp') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.hp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lw_jb">{{ trans('cruds.task.fields.lw_jb') }}</label>
                <input class="form-control {{ $errors->has('lw_jb') ? 'is-invalid' : '' }}" type="text" name="lw_jb" id="lw_jb" value="{{ old('lw_jb', '') }}">
                @if($errors->has('lw_jb'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lw_jb') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.lw_jb_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kontrahent_id">{{ trans('cruds.task.fields.kontrahent') }}</label>
                <select class="form-control select2 {{ $errors->has('kontrahent') ? 'is-invalid' : '' }}" name="kontrahent_id" id="kontrahent_id">
                    @foreach($kontrahents as $id => $entry)
                        <option value="{{ $id }}" {{ old('kontrahent_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('kontrahent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kontrahent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.kontrahent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="location">{{ trans('cruds.task.fields.location') }}</label>
                <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text" name="location" id="location" value="{{ old('location', '') }}">
                @if($errors->has('location'))
                    <div class="invalid-feedback">
                        {{ $errors->first('location') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.location_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="monters">{{ trans('cruds.task.fields.monters') }}</label>
                <input class="form-control {{ $errors->has('monters') ? 'is-invalid' : '' }}" type="text" name="monters" id="monters" value="{{ old('monters', '') }}">
                @if($errors->has('monters'))
                    <div class="invalid-feedback">
                        {{ $errors->first('monters') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.monters_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hydr">{{ trans('cruds.task.fields.hydr') }}</label>
                <input class="form-control {{ $errors->has('hydr') ? 'is-invalid' : '' }}" type="text" name="hydr" id="hydr" value="{{ old('hydr', '') }}">
                @if($errors->has('hydr'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hydr') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.hydr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comments">{{ trans('cruds.task.fields.comments') }}</label>
                <input class="form-control {{ $errors->has('comments') ? 'is-invalid' : '' }}" type="text" name="comments" id="comments" value="{{ old('comments', '') }}">
                @if($errors->has('comments'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comments') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.task.fields.comments_helper') }}</span>
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