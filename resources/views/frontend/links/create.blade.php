@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.link.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.links.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="destination">{{ trans('cruds.link.fields.destination') }}</label>
                            <input class="form-control" type="text" name="destination" id="destination" value="{{ old('destination', '') }}" required>
                            @if($errors->has('destination'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('destination') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.link.fields.destination_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.link.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.link.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="add_utm" value="0">
                                <input type="checkbox" name="add_utm" id="add_utm" value="1" {{ old('add_utm', 0) == 1 ? 'checked' : '' }}>
                                <label for="add_utm">{{ trans('cruds.link.fields.add_utm') }}</label>
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
                                <div>
                                    <input type="radio" id="type_{{ $key }}" name="type" value="{{ $key }}" {{ old('type', 'short_url') === (string) $key ? 'checked' : '' }} required>
                                    <label for="type_{{ $key }}">{{ $label }}</label>
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
                            <select class="form-control select2" name="domains_id" id="domains_id" required>
                                @foreach($domains as $id => $entry)
                                    <option value="{{ $id }}" {{ old('domains_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <input class="form-control" type="text" name="custom_name" id="custom_name" value="{{ old('custom_name', '') }}">
                            @if($errors->has('custom_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('custom_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.link.fields.custom_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="user_id">{{ trans('cruds.link.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id">
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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

        </div>
    </div>
</div>
@endsection