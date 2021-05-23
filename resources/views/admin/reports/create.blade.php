@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.report.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reports.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="sn_id">{{ trans('cruds.report.fields.sn') }}</label>
                <select class="form-control select2 {{ $errors->has('sn') ? 'is-invalid' : '' }}" name="sn_id" id="sn_id">
                    @foreach($sns as $id => $entry)
                        <option value="{{ $id }}" {{ old('sn_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('sn'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sn') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.report.fields.sn_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start">{{ trans('cruds.report.fields.start') }}</label>
                <input class="form-control datetime {{ $errors->has('start') ? 'is-invalid' : '' }}" type="text" name="start" id="start" value="{{ old('start') }}">
                @if($errors->has('start'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.report.fields.start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="stop">{{ trans('cruds.report.fields.stop') }}</label>
                <input class="form-control datetime {{ $errors->has('stop') ? 'is-invalid' : '' }}" type="text" name="stop" id="stop" value="{{ old('stop') }}">
                @if($errors->has('stop'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stop') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.report.fields.stop_helper') }}</span>
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