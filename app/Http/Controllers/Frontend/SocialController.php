<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySocialRequest;
use App\Http\Requests\StoreSocialRequest;
use App\Http\Requests\UpdateSocialRequest;
use App\Models\Link;
use App\Models\Social;
use App\Models\Template;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SocialController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('social_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $socials = Social::with(['link', 'template', 'media'])->get();

        return view('frontend.socials.index', compact('socials'));
    }

    public function create()
    {
        abort_if(Gate::denies('social_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $links = Link::pluck('destination', 'id')->prepend(trans('global.pleaseSelect'), '');

        $templates = Template::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.socials.create', compact('links', 'templates'));
    }

    public function store(StoreSocialRequest $request)
    {
        $social = Social::create($request->all());

        if ($request->input('logo', false)) {
            $social->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $social->id]);
        }

        return redirect()->route('frontend.socials.index');
    }

    public function edit(Social $social)
    {
        abort_if(Gate::denies('social_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $links = Link::pluck('destination', 'id')->prepend(trans('global.pleaseSelect'), '');

        $templates = Template::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $social->load('link', 'template');

        return view('frontend.socials.edit', compact('links', 'social', 'templates'));
    }

    public function update(UpdateSocialRequest $request, Social $social)
    {
        $social->update($request->all());

        if ($request->input('logo', false)) {
            if (! $social->logo || $request->input('logo') !== $social->logo->file_name) {
                if ($social->logo) {
                    $social->logo->delete();
                }
                $social->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($social->logo) {
            $social->logo->delete();
        }

        return redirect()->route('frontend.socials.index');
    }

    public function show(Social $social)
    {
        abort_if(Gate::denies('social_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $social->load('link', 'template');

        return view('frontend.socials.show', compact('social'));
    }

    public function destroy(Social $social)
    {
        abort_if(Gate::denies('social_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $social->delete();

        return back();
    }

    public function massDestroy(MassDestroySocialRequest $request)
    {
        $socials = Social::find(request('ids'));

        foreach ($socials as $social) {
            $social->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('social_create') && Gate::denies('social_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Social();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
