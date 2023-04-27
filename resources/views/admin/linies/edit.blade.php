@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.liny.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.linies.update", [$liny->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="diameter">{{ trans('cruds.liny.fields.diameter') }}</label>
                <input class="form-control {{ $errors->has('diameter') ? 'is-invalid' : '' }}" type="number" name="diameter" id="diameter" value="{{ old('diameter', $liny->diameter) }}" step="0.01" required>
                @if($errors->has('diameter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('diameter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.liny.fields.diameter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dostawca">{{ trans('cruds.liny.fields.dostawca') }}</label>
                <input class="form-control {{ $errors->has('dostawca') ? 'is-invalid' : '' }}" type="text" name="dostawca" id="dostawca" value="{{ old('dostawca', $liny->dostawca) }}">
                @if($errors->has('dostawca'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dostawca') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.liny.fields.dostawca_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="crane_id">{{ trans('cruds.liny.fields.crane') }}</label>
                <select class="form-control select2 {{ $errors->has('crane') ? 'is-invalid' : '' }}" name="crane_id" id="crane_id">
                    @foreach($cranes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('crane_id') ? old('crane_id') : $liny->crane->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('crane'))
                    <div class="invalid-feedback">
                        {{ $errors->first('crane') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.liny.fields.crane_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="length">{{ trans('cruds.liny.fields.length') }}</label>
                <input class="form-control {{ $errors->has('length') ? 'is-invalid' : '' }}" type="number" name="length" id="length" value="{{ old('length', $liny->length) }}" step="0.01" required>
                @if($errors->has('length'))
                    <div class="invalid-feedback">
                        {{ $errors->first('length') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.liny.fields.length_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="certificate">{{ trans('cruds.liny.fields.certificate') }}</label>
                <input class="form-control {{ $errors->has('certificate') ? 'is-invalid' : '' }}" type="text" name="certificate" id="certificate" value="{{ old('certificate', $liny->certificate) }}">
                @if($errors->has('certificate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('certificate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.liny.fields.certificate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="certificate_file">{{ trans('cruds.liny.fields.certificate_file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('certificate_file') ? 'is-invalid' : '' }}" id="certificate_file-dropzone">
                </div>
                @if($errors->has('certificate_file'))
                    <div class="invalid-feedback">
                        {{ $errors->first('certificate_file') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.liny.fields.certificate_file_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="stan">{{ trans('cruds.liny.fields.stan') }}</label>
                <input class="form-control {{ $errors->has('stan') ? 'is-invalid' : '' }}" type="text" name="stan" id="stan" value="{{ old('stan', $liny->stan) }}">
                @if($errors->has('stan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.liny.fields.stan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comments">{{ trans('cruds.liny.fields.comments') }}</label>
                <input class="form-control {{ $errors->has('comments') ? 'is-invalid' : '' }}" type="text" name="comments" id="comments" value="{{ old('comments', $liny->comments) }}">
                @if($errors->has('comments'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comments') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.liny.fields.comments_helper') }}</span>
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
    url: '{{ route('admin.linies.storeMedia') }}',
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
@if(isset($liny) && $liny->certificate_file)
      var file = {!! json_encode($liny->certificate_file) !!}
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