@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.click.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.clicks.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.click.fields.link') }}
                                    </th>
                                    <td>
                                        {{ $click->link->custom_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.click.fields.click_count') }}
                                    </th>
                                    <td>
                                        {{ $click->click_count }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.click.fields.source') }}
                                    </th>
                                    <td>
                                        {{ $click->source }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.click.fields.user_agent') }}
                                    </th>
                                    <td>
                                        {{ $click->user_agent }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.click.fields.ip_address') }}
                                    </th>
                                    <td>
                                        {{ $click->ip_address }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.clicks.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection