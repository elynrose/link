@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.click.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.clicks.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="link_id">{{ trans('cruds.click.fields.link') }}</label>
                <select class="form-control select2 {{ $errors->has('link') ? 'is-invalid' : '' }}" name="link_id" id="link_id" required>
                    @foreach($links as $id => $entry)
                        <option value="{{ $id }}" {{ old('link_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.click.fields.link_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="click_count">{{ trans('cruds.click.fields.click_count') }}</label>
                <input class="form-control {{ $errors->has('click_count') ? 'is-invalid' : '' }}" type="number" name="click_count" id="click_count" value="{{ old('click_count', '') }}" step="1" required>
                @if($errors->has('click_count'))
                    <div class="invalid-feedback">
                        {{ $errors->first('click_count') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.click.fields.click_count_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="source">{{ trans('cruds.click.fields.source') }}</label>
                <input class="form-control {{ $errors->has('source') ? 'is-invalid' : '' }}" type="text" name="source" id="source" value="{{ old('source', '') }}">
                @if($errors->has('source'))
                    <div class="invalid-feedback">
                        {{ $errors->first('source') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.click.fields.source_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_agent">{{ trans('cruds.click.fields.user_agent') }}</label>
                <input class="form-control {{ $errors->has('user_agent') ? 'is-invalid' : '' }}" type="text" name="user_agent" id="user_agent" value="{{ old('user_agent', '') }}">
                @if($errors->has('user_agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user_agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.click.fields.user_agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ip_address">{{ trans('cruds.click.fields.ip_address') }}</label>
                <input class="form-control {{ $errors->has('ip_address') ? 'is-invalid' : '' }}" type="text" name="ip_address" id="ip_address" value="{{ old('ip_address', '') }}">
                @if($errors->has('ip_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ip_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.click.fields.ip_address_helper') }}</span>
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