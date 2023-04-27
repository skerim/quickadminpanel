@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.type.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.types.update", [$type->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.type.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $type->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.type.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="type_2">{{ trans('cruds.type.fields.type_2') }}</label>
                <input class="form-control {{ $errors->has('type_2') ? 'is-invalid' : '' }}" type="text" name="type_2" id="type_2" value="{{ old('type_2', $type->type_2) }}">
                @if($errors->has('type_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.type.fields.type_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="producer_id">{{ trans('cruds.type.fields.producer') }}</label>
                <select class="form-control select2 {{ $errors->has('producer') ? 'is-invalid' : '' }}" name="producer_id" id="producer_id" required>
                    @foreach($producers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('producer_id') ? old('producer_id') : $type->producer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('producer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('producer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.type.fields.producer_helper') }}</span>
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