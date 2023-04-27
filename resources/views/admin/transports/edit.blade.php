@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.transport.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.transports.update", [$transport->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.transport.fields.transport') }}</label>
                <select class="form-control {{ $errors->has('transport') ? 'is-invalid' : '' }}" name="transport" id="transport" required>
                    <option value disabled {{ old('transport', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Transport::TRANSPORT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('transport', $transport->transport) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('transport'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transport') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transport.fields.transport_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="budowa">{{ trans('cruds.transport.fields.budowa') }}</label>
                <input class="form-control {{ $errors->has('budowa') ? 'is-invalid' : '' }}" type="text" name="budowa" id="budowa" value="{{ old('budowa', $transport->budowa) }}">
                @if($errors->has('budowa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('budowa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transport.fields.budowa_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data">{{ trans('cruds.transport.fields.data') }}</label>
                <input class="form-control date {{ $errors->has('data') ? 'is-invalid' : '' }}" type="text" name="data" id="data" value="{{ old('data', $transport->data) }}">
                @if($errors->has('data'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transport.fields.data_helper') }}</span>
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