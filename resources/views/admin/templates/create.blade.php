@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.template.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.templates.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.template.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.template.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="background_image">{{ trans('cruds.template.fields.background_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('background_image') ? 'is-invalid' : '' }}" id="background_image-dropzone">
                </div>
                @if($errors->has('background_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('background_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.template.fields.background_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="style">{{ trans('cruds.template.fields.style') }}</label>
                <textarea class="form-control {{ $errors->has('style') ? 'is-invalid' : '' }}" name="style" id="style">{{ old('style') }}</textarea>
                @if($errors->has('style'))
                    <div class="invalid-feedback">
                        {{ $errors->first('style') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.template.fields.style_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="javascript">{{ trans('cruds.template.fields.javascript') }}</label>
                <textarea class="form-control {{ $errors->has('javascript') ? 'is-invalid' : '' }}" name="javascript" id="javascript">{{ old('javascript') }}</textarea>
                @if($errors->has('javascript'))
                    <div class="invalid-feedback">
                        {{ $errors->first('javascript') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.template.fields.javascript_helper') }}</span>
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
    Dropzone.options.backgroundImageDropzone = {
    url: '{{ route('admin.templates.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="background_image"]').remove()
      $('form').append('<input type="hidden" name="background_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="background_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($template) && $template->background_image)
      var file = {!! json_encode($template->background_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="background_image" value="' + file.file_name + '">')
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