@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.social.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.socials.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.link') }}
                                    </th>
                                    <td>
                                        {{ $social->link->destination ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.template') }}
                                    </th>
                                    <td>
                                        {{ $social->template->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.logo') }}
                                    </th>
                                    <td>
                                        @if($social->logo)
                                            <a href="{{ $social->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $social->logo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.page_title') }}
                                    </th>
                                    <td>
                                        {{ $social->page_title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.keywords') }}
                                    </th>
                                    <td>
                                        {{ $social->keywords }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.description') }}
                                    </th>
                                    <td>
                                        {{ $social->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.facebook') }}
                                    </th>
                                    <td>
                                        {{ $social->facebook }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.twitter') }}
                                    </th>
                                    <td>
                                        {{ $social->twitter }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.instagram') }}
                                    </th>
                                    <td>
                                        {{ $social->instagram }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.linked_in') }}
                                    </th>
                                    <td>
                                        {{ $social->linked_in }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.pinterest') }}
                                    </th>
                                    <td>
                                        {{ $social->pinterest }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.threads') }}
                                    </th>
                                    <td>
                                        {{ $social->threads }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.youtube') }}
                                    </th>
                                    <td>
                                        {{ $social->youtube }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.tiktok') }}
                                    </th>
                                    <td>
                                        {{ $social->tiktok }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.social.fields.footer') }}
                                    </th>
                                    <td>
                                        {{ $social->footer }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.socials.index') }}">
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