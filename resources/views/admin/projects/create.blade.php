@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.project.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.projects.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="customer_id">{{ trans('cruds.project.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                    @foreach($customers as $id => $entry)
                        <option value="{{ $id }}" {{ old('customer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.project.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name_2">{{ trans('cruds.project.fields.name_2') }}</label>
                <input class="form-control {{ $errors->has('name_2') ? 'is-invalid' : '' }}" type="text" name="name_2" id="name_2" value="{{ old('name_2', '') }}">
                @if($errors->has('name_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.name_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="city">{{ trans('cruds.project.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', '') }}">
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="street">{{ trans('cruds.project.fields.street') }}</label>
                <input class="form-control {{ $errors->has('street') ? 'is-invalid' : '' }}" type="text" name="street" id="street" value="{{ old('street', '') }}">
                @if($errors->has('street'))
                    <div class="invalid-feedback">
                        {{ $errors->first('street') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.street_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="file">{{ trans('cruds.project.fields.file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('file') ? 'is-invalid' : '' }}" id="file-dropzone">
                </div>
                @if($errors->has('file'))
                    <div class="invalid-feedback">
                        {{ $errors->first('file') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.file_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="users">{{ trans('cruds.project.fields.user') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('users') ? 'is-invalid' : '' }}" name="users[]" id="users" multiple>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ in_array($id, old('users', [])) ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('users'))
                    <div class="invalid-feedback">
                        {{ $errors->first('users') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="enowa">{{ trans('cruds.project.fields.enowa') }}</label>
                <input class="form-control {{ $errors->has('enowa') ? 'is-invalid' : '' }}" type="text" name="enowa" id="enowa" value="{{ old('enowa', '') }}">
                @if($errors->has('enowa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('enowa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.enowa_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rentals">{{ trans('cruds.project.fields.rental') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('rentals') ? 'is-invalid' : '' }}" name="rentals[]" id="rentals" multiple>
                    @foreach($rentals as $id => $rental)
                        <option value="{{ $id }}" {{ in_array($id, old('rentals', [])) ? 'selected' : '' }}>{{ $rental }}</option>
                    @endforeach
                </select>
                @if($errors->has('rentals'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rentals') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.rental_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact">{{ trans('cruds.project.fields.contact') }}</label>
                <input class="form-control {{ $errors->has('contact') ? 'is-invalid' : '' }}" type="text" name="contact" id="contact" value="{{ old('contact', '') }}">
                @if($errors->has('contact'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email_contact">{{ trans('cruds.project.fields.email_contact') }}</label>
                <input class="form-control {{ $errors->has('email_contact') ? 'is-invalid' : '' }}" type="email" name="email_contact" id="email_contact" value="{{ old('email_contact') }}">
                @if($errors->has('email_contact'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email_contact') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.email_contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.project.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks') }}</textarea>
                @if($errors->has('remarks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('remarks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.remarks_helper') }}</span>
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
    var uploadedFileMap = {}
Dropzone.options.fileDropzone = {
    url: '{{ route('admin.projects.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="file[]" value="' + response.name + '">')
      uploadedFileMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFileMap[file.name]
      }
      $('form').find('input[name="file[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($project) && $project->file)
          var files =
            {!! json_encode($project->file) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="file[]" value="' + file.file_name + '">')
            }
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