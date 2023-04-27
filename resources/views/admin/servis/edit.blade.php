@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.servi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.servis.update", [$servi->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="crane_id">{{ trans('cruds.servi.fields.crane') }}</label>
                <select class="form-control select2 {{ $errors->has('crane') ? 'is-invalid' : '' }}" name="crane_id" id="crane_id" required>
                    @foreach($cranes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('crane_id') ? old('crane_id') : $servi->crane->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('crane'))
                    <div class="invalid-feedback">
                        {{ $errors->first('crane') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.servi.fields.crane_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_id">{{ trans('cruds.servi.fields.project') }}</label>
                <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}" name="project_id" id="project_id">
                    @foreach($projects as $id => $entry)
                        <option value="{{ $id }}" {{ (old('project_id') ? old('project_id') : $servi->project->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('project'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.servi.fields.project_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="conservator_id">{{ trans('cruds.servi.fields.conservator') }}</label>
                <select class="form-control select2 {{ $errors->has('conservator') ? 'is-invalid' : '' }}" name="conservator_id" id="conservator_id">
                    @foreach($conservators as $id => $entry)
                        <option value="{{ $id }}" {{ (old('conservator_id') ? old('conservator_id') : $servi->conservator->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('conservator'))
                    <div class="invalid-feedback">
                        {{ $errors->first('conservator') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.servi.fields.conservator_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="discription">{{ trans('cruds.servi.fields.discription') }}</label>
                <textarea class="form-control {{ $errors->has('discription') ? 'is-invalid' : '' }}" name="discription" id="discription">{{ old('discription', $servi->discription) }}</textarea>
                @if($errors->has('discription'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discription') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.servi.fields.discription_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.servi.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $servi->status) }}">
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.servi.fields.status_helper') }}</span>
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