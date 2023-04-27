@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.zawiesium.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.zawiesia.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nr">{{ trans('cruds.zawiesium.fields.nr') }}</label>
                <input class="form-control {{ $errors->has('nr') ? 'is-invalid' : '' }}" type="text" name="nr" id="nr" value="{{ old('nr', '') }}">
                @if($errors->has('nr'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nr') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.zawiesium.fields.nr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="klasa">{{ trans('cruds.zawiesium.fields.klasa') }}</label>
                <input class="form-control {{ $errors->has('klasa') ? 'is-invalid' : '' }}" type="text" name="klasa" id="klasa" value="{{ old('klasa', '') }}">
                @if($errors->has('klasa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('klasa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.zawiesium.fields.klasa_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="expiration_date">{{ trans('cruds.zawiesium.fields.expiration_date') }}</label>
                <input class="form-control date {{ $errors->has('expiration_date') ? 'is-invalid' : '' }}" type="text" name="expiration_date" id="expiration_date" value="{{ old('expiration_date') }}" required>
                @if($errors->has('expiration_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expiration_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.zawiesium.fields.expiration_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="certificate_file">{{ trans('cruds.zawiesium.fields.certificate_file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('certificate_file') ? 'is-invalid' : '' }}" id="certificate_file-dropzone">
                </div>
                @if($errors->has('certificate_file'))
                    <div class="invalid-feedback">
                        {{ $errors->first('certificate_file') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.zawiesium.fields.certificate_file_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="load">{{ trans('cruds.zawiesium.fields.load') }}</label>
                <input class="form-control {{ $errors->has('load') ? 'is-invalid' : '' }}" type="text" name="load" id="load" value="{{ old('load', '') }}" required>
                @if($errors->has('load'))
                    <div class="invalid-feedback">
                        {{ $errors->first('load') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.zawiesium.fields.load_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="length">{{ trans('cruds.zawiesium.fields.length') }}</label>
                <input class="form-control {{ $errors->has('length') ? 'is-invalid' : '' }}" type="number" name="length" id="length" value="{{ old('length', '') }}" step="0.01">
                @if($errors->has('length'))
                    <div class="invalid-feedback">
                        {{ $errors->first('length') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.zawiesium.fields.length_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="crane_id">{{ trans('cruds.zawiesium.fields.crane') }}</label>
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
                <span class="help-block">{{ trans('cruds.zawiesium.fields.crane_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="type">{{ trans('cruds.zawiesium.fields.type') }}</label>
                <input class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" type="text" name="type" id="type" value="{{ old('type', '') }}">
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.zawiesium.fields.type_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.certificateFileDropzone = {
    url: '{{ route('admin.zawiesia.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="certificate_file"]').remove()
      $('form').append('<input type="hidden" name="certificate_file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="certificate_file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($zawiesium) && $zawiesium->certificate_file)
      var file = {!! json_encode($zawiesium->certificate_file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="certificate_file" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection