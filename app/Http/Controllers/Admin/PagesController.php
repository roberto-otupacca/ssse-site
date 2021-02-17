<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPageRequest;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Color;
use App\Models\Page;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PagesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::get();

        $colors = Color::get();

        return view('admin.pages.index', compact('pages', 'colors'));
    }

    public function create()
    {
        abort_if(Gate::denies('page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parents = Page::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $colors = Color::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pages.create', compact('parents', 'colors'));
    }

    public function store(StorePageRequest $request)
    {
        $page = Page::create($request->all());

        foreach ($request->input('photo', []) as $file) {
            $page->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $page->id]);
        }

        return redirect()->route('admin.pages.index');
    }

    public function edit(Page $page)
    {
        abort_if(Gate::denies('page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parents = Page::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $colors = Color::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $page->load('parent', 'color');

        return view('admin.pages.edit', compact('parents', 'colors', 'page'));
    }

    public function update(UpdatePageRequest $request, Page $page)
    {
        $page->update($request->all());

        if (count($page->photo) > 0) {
            foreach ($page->photo as $media) {
                if (!in_array($media->file_name, $request->input('photo', []))) {
                    $media->delete();
                }
            }
        }

        $media = $page->photo->pluck('file_name')->toArray();

        foreach ($request->input('photo', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $page->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photo');
            }
        }

        return redirect()->route('admin.pages.index');
    }

    public function show(Page $page)
    {
        abort_if(Gate::denies('page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $page->load('parent', 'color', 'pagesFiles', 'pagesLinks');

        return view('admin.pages.show', compact('page'));
    }

    public function destroy(Page $page)
    {
        abort_if(Gate::denies('page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $page->delete();

        return back();
    }

    public function massDestroy(MassDestroyPageRequest $request)
    {
        Page::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('page_create') && Gate::denies('page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Page();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
