@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.klimatyzacja.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.klimatyzacjas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="crane_id">{{ trans('cruds.klimatyzacja.fields.crane') }}</label>
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
                <span class="help-block">{{ trans('cruds.klimatyzacja.fields.crane_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="model">{{ trans('cruds.klimatyzacja.fields.model') }}</label>
                <input class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}" type="text" name="model" id="model" value="{{ old('model', '') }}" required>
                @if($errors->has('model'))
                    <div class="invalid-feedback">
                        {{ $errors->first('model') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.klimatyzacja.fields.model_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_montazu">{{ trans('cruds.klimatyzacja.fields.data_montazu') }}</label>
                <input class="form-control date {{ $errors->has('data_montazu') ? 'is-invalid' : '' }}" type="text" name="data_montazu" id="data_montazu" value="{{ old('data_montazu') }}">
                @if($errors->has('data_montazu'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_montazu') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.klimatyzacja.fields.data_montazu_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_konserwacji">{{ trans('cruds.klimatyzacja.fields.data_konserwacji') }}</label>
                <input class="form-control date {{ $errors->has('data_konserwacji') ? 'is-invalid' : '' }}" type="text" name="data_konserwacji" id="data_konserwacji" value="{{ old('data_konserwacji') }}">
                @if($errors->has('data_konserwacji'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_konserwacji') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.klimatyzacja.fields.data_konserwacji_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comments">{{ trans('cruds.klimatyzacja.fields.comments') }}</label>
                <input class="form-control {{ $errors->has('comments') ? 'is-invalid' : '' }}" type="text" name="comments" id="comments" value="{{ old('comments', '') }}">
                @if($errors->has('comments'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comments') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.klimatyzacja.fields.comments_helper') }}</span>
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