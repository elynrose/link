@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.qrCode.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.qr-codes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.qrCode.fields.link') }}
                        </th>
                        <td>
                            {{ $qrCode->link->destination ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrCode.fields.color') }}
                        </th>
                        <td>
                            {{ $qrCode->color }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrCode.fields.size') }}
                        </th>
                        <td>
                            {{ $qrCode->size }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrCode.fields.bg_color') }}
                        </th>
                        <td>
                            {{ $qrCode->bg_color }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrCode.fields.style') }}
                        </th>
                        <td>
                            {{ App\Models\QrCode::STYLE_SELECT[$qrCode->style] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.qr-codes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection