@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.support.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.supports.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="crane_id">{{ trans('cruds.support.fields.crane') }}</label>
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
                <span class="help-block">{{ trans('cruds.support.fields.crane_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="budowa">{{ trans('cruds.support.fields.budowa') }}</label>
                <input class="form-control {{ $errors->has('budowa') ? 'is-invalid' : '' }}" type="text" name="budowa" id="budowa" value="{{ old('budowa', '') }}">
                @if($errors->has('budowa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('budowa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.support.fields.budowa_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="region">{{ trans('cruds.support.fields.region') }}</label>
                <input class="form-control {{ $errors->has('region') ? 'is-invalid' : '' }}" type="text" name="region" id="region" value="{{ old('region', '') }}">
                @if($errors->has('region'))
                    <div class="invalid-feedback">
                        {{ $errors->first('region') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.support.fields.region_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kontrahent_id">{{ trans('cruds.support.fields.kontrahent') }}</label>
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
                <span class="help-block">{{ trans('cruds.support.fields.kontrahent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transport_id">{{ trans('cruds.support.fields.transport') }}</label>
                <select class="form-control select2 {{ $errors->has('transport') ? 'is-invalid' : '' }}" name="transport_id" id="transport_id">
                    @foreach($transports as $id => $entry)
                        <option value="{{ $id }}" {{ old('transport_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('transport'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transport') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.support.fields.transport_helper') }}</span>
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