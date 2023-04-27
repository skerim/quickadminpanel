@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.raport.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.raports.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="crane_sn_id">{{ trans('cruds.raport.fields.crane_sn') }}</label>
                <select class="form-control select2 {{ $errors->has('crane_sn') ? 'is-invalid' : '' }}" name="crane_sn_id" id="crane_sn_id" required>
                    @foreach($crane_sns as $id => $entry)
                        <option value="{{ $id }}" {{ old('crane_sn_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('crane_sn'))
                    <div class="invalid-feedback">
                        {{ $errors->first('crane_sn') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.raport.fields.crane_sn_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data">{{ trans('cruds.raport.fields.data') }}</label>
                <input class="form-control date {{ $errors->has('data') ? 'is-invalid' : '' }}" type="text" name="data" id="data" value="{{ old('data') }}">
                @if($errors->has('data'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.raport.fields.data_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start">{{ trans('cruds.raport.fields.start') }}</label>
                <input class="form-control timepicker {{ $errors->has('start') ? 'is-invalid' : '' }}" type="text" name="start" id="start" value="{{ old('start') }}">
                @if($errors->has('start'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.raport.fields.start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="stop">{{ trans('cruds.raport.fields.stop') }}</label>
                <input class="form-control timepicker {{ $errors->has('stop') ? 'is-invalid' : '' }}" type="text" name="stop" id="stop" value="{{ old('stop') }}">
                @if($errors->has('stop'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stop') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.raport.fields.stop_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="work">{{ trans('cruds.raport.fields.work') }}</label>
                <input class="form-control timepicker {{ $errors->has('work') ? 'is-invalid' : '' }}" type="text" name="work" id="work" value="{{ old('work') }}">
                @if($errors->has('work'))
                    <div class="invalid-feedback">
                        {{ $errors->first('work') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.raport.fields.work_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="engine">{{ trans('cruds.raport.fields.engine') }}</label>
                <input class="form-control {{ $errors->has('engine') ? 'is-invalid' : '' }}" type="text" name="engine" id="engine" value="{{ old('engine', '') }}">
                @if($errors->has('engine'))
                    <div class="invalid-feedback">
                        {{ $errors->first('engine') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.raport.fields.engine_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gps_kraj">{{ trans('cruds.raport.fields.gps_kraj') }}</label>
                <input class="form-control {{ $errors->has('gps_kraj') ? 'is-invalid' : '' }}" type="text" name="gps_kraj" id="gps_kraj" value="{{ old('gps_kraj', '') }}">
                @if($errors->has('gps_kraj'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gps_kraj') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.raport.fields.gps_kraj_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gps_woj">{{ trans('cruds.raport.fields.gps_woj') }}</label>
                <input class="form-control {{ $errors->has('gps_woj') ? 'is-invalid' : '' }}" type="text" name="gps_woj" id="gps_woj" value="{{ old('gps_woj', '') }}">
                @if($errors->has('gps_woj'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gps_woj') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.raport.fields.gps_woj_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gps_city">{{ trans('cruds.raport.fields.gps_city') }}</label>
                <input class="form-control {{ $errors->has('gps_city') ? 'is-invalid' : '' }}" type="text" name="gps_city" id="gps_city" value="{{ old('gps_city', '') }}">
                @if($errors->has('gps_city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gps_city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.raport.fields.gps_city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gps_ulica">{{ trans('cruds.raport.fields.gps_ulica') }}</label>
                <input class="form-control {{ $errors->has('gps_ulica') ? 'is-invalid' : '' }}" type="text" name="gps_ulica" id="gps_ulica" value="{{ old('gps_ulica', '') }}">
                @if($errors->has('gps_ulica'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gps_ulica') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.raport.fields.gps_ulica_helper') }}</span>
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