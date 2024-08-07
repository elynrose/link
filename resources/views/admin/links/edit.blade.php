@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.link.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.links.update", [$link->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="destination">{{ trans('cruds.link.fields.destination') }}</label>
                <input class="form-control {{ $errors->has('destination') ? 'is-invalid' : '' }}" type="text" name="destination" id="destination" value="{{ old('destination', $link->destination) }}" required>
                @if($errors->has('destination'))
                    <div class="invalid-feedback">
                        {{ $errors->first('destination') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.link.fields.destination_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.link.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $link->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.link.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('add_utm') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="add_utm" value="0">
                    <input class="form-check-input" type="checkbox" name="add_utm" id="add_utm" value="1" {{ $link->add_utm || old('add_utm', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="add_utm">{{ trans('cruds.link.fields.add_utm') }}</label>
                </div>
                @if($errors->has('add_utm'))
                    <div class="invalid-feedback">
                        {{ $errors->first('add_utm') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.link.fields.add_utm_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.link.fields.type') }}</label>
                @foreach(App\Models\Link::TYPE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('type') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="type_{{ $key }}" name="type" value="{{ $key }}" {{ old('type', $link->type) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="type_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.link.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="domains_id">{{ trans('cruds.link.fields.domains') }}</label>
                <select class="form-control select2 {{ $errors->has('domains') ? 'is-invalid' : '' }}" name="domains_id" id="domains_id" required>
                    @foreach($domains as $id => $entry)
                        <option value="{{ $id }}" {{ (old('domains_id') ? old('domains_id') : $link->domains->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('domains'))
                    <div class="invalid-feedback">
                        {{ $errors->first('domains') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.link.fields.domains_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="custom_name">{{ trans('cruds.link.fields.custom_name') }}</label>
                <input class="form-control {{ $errors->has('custom_name') ? 'is-invalid' : '' }}" type="text" name="custom_name" id="custom_name" value="{{ old('custom_name', $link->custom_name) }}">
                @if($errors->has('custom_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('custom_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.link.fields.custom_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.link.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $link->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.link.fields.user_helper') }}</span>
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