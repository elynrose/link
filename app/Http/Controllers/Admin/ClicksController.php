<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClickRequest;
use App\Http\Requests\StoreClickRequest;
use App\Http\Requests\UpdateClickRequest;
use App\Models\Click;
use App\Models\Link;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClicksController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('click_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clicks = Click::with(['link'])->get();

        return view('admin.clicks.index', compact('clicks'));
    }

    public function create()
    {
        abort_if(Gate::denies('click_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $links = Link::pluck('custom_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.clicks.create', compact('links'));
    }

    public function store(StoreClickRequest $request)
    {
        $click = Click::create($request->all());

        return redirect()->route('admin.clicks.index');
    }

    public function edit(Click $click)
    {
        abort_if(Gate::denies('click_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $links = Link::pluck('custom_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $click->load('link');

        return view('admin.clicks.edit', compact('click', 'links'));
    }

    public function update(UpdateClickRequest $request, Click $click)
    {
        $click->update($request->all());

        return redirect()->route('admin.clicks.index');
    }

    public function show(Click $click)
    {
        abort_if(Gate::denies('click_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $click->load('link');

        return view('admin.clicks.show', compact('click'));
    }

    public function destroy(Click $click)
    {
        abort_if(Gate::denies('click_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $click->delete();

        return back();
    }

    public function massDestroy(MassDestroyClickRequest $request)
    {
        $clicks = Click::find(request('ids'));

        foreach ($clicks as $click) {
            $click->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
