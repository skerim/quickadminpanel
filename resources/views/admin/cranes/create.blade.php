@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.crane.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cranes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="type_id">{{ trans('cruds.crane.fields.type') }}</label>
                <select class="form-control select2 {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type_id" id="type_id" required>
                    @foreach($types as $id => $entry)
                        <option value="{{ $id }}" {{ old('type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crane.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sn">{{ trans('cruds.crane.fields.sn') }}</label>
                <input class="form-control {{ $errors->has('sn') ? 'is-invalid' : '' }}" type="text" name="sn" id="sn" value="{{ old('sn', '') }}" required>
                @if($errors->has('sn'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sn') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crane.fields.sn_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="producer_id">{{ trans('cruds.crane.fields.producer') }}</label>
                <select class="form-control select2 {{ $errors->has('producer') ? 'is-invalid' : '' }}" name="producer_id" id="producer_id" required>
                    @foreach($producers as $id => $entry)
                        <option value="{{ $id }}" {{ old('producer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('producer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('producer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crane.fields.producer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="year">{{ trans('cruds.crane.fields.year') }}</label>
                <input class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" type="text" name="year" id="year" value="{{ old('year', '') }}">
                @if($errors->has('year'))
                    <div class="invalid-feedback">
                        {{ $errors->first('year') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crane.fields.year_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="max_load">{{ trans('cruds.crane.fields.max_load') }}</label>
                <input class="form-control {{ $errors->has('max_load') ? 'is-invalid' : '' }}" type="number" name="max_load" id="max_load" value="{{ old('max_load', '') }}" step="1">
                @if($errors->has('max_load'))
                    <div class="invalid-feedback">
                        {{ $errors->first('max_load') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crane.fields.max_load_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="udt">{{ trans('cruds.crane.fields.udt') }}</label>
                <input class="form-control {{ $errors->has('udt') ? 'is-invalid' : '' }}" type="text" name="udt" id="udt" value="{{ old('udt', '') }}">
                @if($errors->has('udt'))
                    <div class="invalid-feedback">
                        {{ $errors->first('udt') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crane.fields.udt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="enova">{{ trans('cruds.crane.fields.enova') }}</label>
                <input class="form-control {{ $errors->has('enova') ? 'is-invalid' : '' }}" type="text" name="enova" id="enova" value="{{ old('enova', '') }}">
                @if($errors->has('enova'))
                    <div class="invalid-feedback">
                        {{ $errors->first('enova') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crane.fields.enova_helper') }}</span>
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