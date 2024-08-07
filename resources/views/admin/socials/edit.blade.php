@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.social.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.socials.update", [$social->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="link_id">{{ trans('cruds.social.fields.link') }}</label>
                <select class="form-control select2 {{ $errors->has('link') ? 'is-invalid' : '' }}" name="link_id" id="link_id" required>
                    @foreach($links as $id => $entry)
                        <option value="{{ $id }}" {{ (old('link_id') ? old('link_id') : $social->link->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.social.fields.link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="template_id">{{ trans('cruds.social.fields.template') }}</label>
                <select class="form-control select2 {{ $errors->has('template') ? 'is-invalid' : '' }}" name="template_id" id="template_id">
                    @foreach($templates as $id => $entry)
                        <option value="{{ $id }}" {{ (old('template_id') ? old('template_id') : $social->template->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('template'))
                    <div class="invalid-feedback">
                        {{ $errors->first('template') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.social.fields.template_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo">{{ trans('cruds.social.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.social.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="page_title">{{ trans('cruds.social.fields.page_title') }}</label>
                <input class="form-control {{ $errors->has('page_title') ? 'is-invalid' : '' }}" type="text" name="page_title" id="page_title" value="{{ old('page_title', $social->page_title) }}" required>
                @if($errors->has('page_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('page_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.social.fields.page_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keywords">{{ trans('cruds.social.fields.keywords') }}</label>
                <input class="form-control {{ $errors->has('keywords') ? 'is-invalid' : '' }}" type="text" name="keywords" id="keywords" value="{{ old('keywords', $social->keywords) }}">
                @if($errors->has('keywords'))
                    <div class="invalid-feedback">
                        {{ $errors->first('keywords') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.social.fields.keywords_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.social.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $social->description) }}" required>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.social.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.social.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', $social->facebook) }}">
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.social.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.social.fields.twitter') }}</label>
                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', $social->twitter) }}">
                @if($errors->has('twitter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.social.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram">{{ trans('cruds.social.fields.instagram') }}</label>
                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', $social->instagram) }}">
                @if($errors->has('instagram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.social.fields.instagram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="linked_in">{{ trans('cruds.social.fields.linked_in') }}</label>
                <input class="form-control {{ $errors->has('linked_in') ? 'is-invalid' : '' }}" type="text" name="linked_in" id="linked_in" value="{{ old('linked_in', $social->linked_in) }}">
                @if($errors->has('linked_in'))
                    <div class="invalid-feedback">
                        {{ $errors->first('linked_in') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.social.fields.linked_in_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pinterest">{{ trans('cruds.social.fields.pinterest') }}</label>
                <input class="form-control {{ $errors->has('pinterest') ? 'is-invalid' : '' }}" type="text" name="pinterest" id="pinterest" value="{{ old('pinterest', $social->pinterest) }}">
                @if($errors->has('pinterest'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pinterest') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.social.fields.pinterest_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="threads">{{ trans('cruds.social.fields.threads') }}</label>
                <input class="form-control {{ $errors->has('threads') ? 'is-invalid' : '' }}" type="text" name="threads" id="threads" value="{{ old('threads', $social->threads) }}">
                @if($errors->has('threads'))
                    <div class="invalid-feedback">
                        {{ $errors->first('threads') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.social.fields.threads_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="youtube">{{ trans('cruds.social.fields.youtube') }}</label>
                <input class="form-control {{ $errors->has('youtube') ? 'is-invalid' : '' }}" type="text" name="youtube" id="youtube" value="{{ old('youtube', $social->youtube) }}">
                @if($errors->has('youtube'))
                    <div class="invalid-feedback">
                        {{ $errors->first('youtube') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.social.fields.youtube_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tiktok">{{ trans('cruds.social.fields.tiktok') }}</label>
                <input class="form-control {{ $errors->has('tiktok') ? 'is-invalid' : '' }}" type="text" name="tiktok" id="tiktok" value="{{ old('tiktok', $social->tiktok) }}">
                @if($errors->has('tiktok'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tiktok') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.social.fields.tiktok_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="footer">{{ trans('cruds.social.fields.footer') }}</label>
                <input class="form-control {{ $errors->has('footer') ? 'is-invalid' : '' }}" type="text" name="footer" id="footer" value="{{ old('footer', $social->footer) }}">
                @if($errors->has('footer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('footer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.social.fields.footer_helper') }}</span>
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
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.socials.storeMedia') }}',
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
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($social) && $social->logo)
      var file = {!! json_encode($social->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
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