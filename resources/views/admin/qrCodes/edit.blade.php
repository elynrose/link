@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.qrCode.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.qr-codes.update", [$qrCode->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="link_id">{{ trans('cruds.qrCode.fields.link') }}</label>
                <select class="form-control select2 {{ $errors->has('link') ? 'is-invalid' : '' }}" name="link_id" id="link_id" required>
                    @foreach($links as $id => $entry)
                        <option value="{{ $id }}" {{ (old('link_id') ? old('link_id') : $qrCode->link->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.qrCode.fields.link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="color">{{ trans('cruds.qrCode.fields.color') }}</label>
                <input class="form-control {{ $errors->has('color') ? 'is-invalid' : '' }}" type="text" name="color" id="color" value="{{ old('color', $qrCode->color) }}">
                @if($errors->has('color'))
                    <div class="invalid-feedback">
                        {{ $errors->first('color') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.qrCode.fields.color_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="size">{{ trans('cruds.qrCode.fields.size') }}</label>
                <input class="form-control {{ $errors->has('size') ? 'is-invalid' : '' }}" type="number" name="size" id="size" value="{{ old('size', $qrCode->size) }}" step="1">
                @if($errors->has('size'))
                    <div class="invalid-feedback">
                        {{ $errors->first('size') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.qrCode.fields.size_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bg_color">{{ trans('cruds.qrCode.fields.bg_color') }}</label>
                <input class="form-control {{ $errors->has('bg_color') ? 'is-invalid' : '' }}" type="text" name="bg_color" id="bg_color" value="{{ old('bg_color', $qrCode->bg_color) }}">
                @if($errors->has('bg_color'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bg_color') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.qrCode.fields.bg_color_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.qrCode.fields.style') }}</label>
                <select class="form-control {{ $errors->has('style') ? 'is-invalid' : '' }}" name="style" id="style">
                    <option value disabled {{ old('style', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\QrCode::STYLE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('style', $qrCode->style) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('style'))
                    <div class="invalid-feedback">
                        {{ $errors->first('style') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.qrCode.fields.style_helper') }}</span>
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