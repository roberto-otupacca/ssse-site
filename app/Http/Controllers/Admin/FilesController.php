<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyFileRequest;
use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Models\Category;
use App\Models\File;
use App\Models\News;
use App\Models\Page;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class FilesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('file_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $files = File::with(['pages', 'news', 'category', 'media'])->get();

        $pages = Page::get();

        $news = News::get();

        $categories = Category::get();

        return view('admin.files.index', compact('files', 'pages', 'news', 'categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('file_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $pages = Page::all()->pluck('title', 'id');
        $pages = Page::all();

        $news = News::all()->pluck('title', 'id');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.files.create', compact('pages', 'news', 'categories'));
    }

    public function store(StoreFileRequest $request)
    {
        $file = File::create($request->all());
        $file->pages()->sync($request->input('pages', []));
        $file->news()->sync($request->input('news', []));

        if ($request->input('file', false)) {
            $file->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $file->id]);
        }

        return redirect()->route('admin.files.index');
    }

    public function edit(File $file)
    {
        abort_if(Gate::denies('file_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $pages = Page::all()->pluck('title', 'id');
        $pages = Page::all();

        $news = News::all()->pluck('title', 'id');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $file->load('pages', 'news', 'category');

        return view('admin.files.edit', compact('pages', 'news', 'categories', 'file'));
    }

    public function update(UpdateFileRequest $request, File $file)
    {
        $file->update($request->all());
        $file->pages()->sync($request->input('pages', []));
        $file->news()->sync($request->input('news', []));

        if ($request->input('file', false)) {
            if (!$file->file || $request->input('file') !== $file->file->file_name) {
                if ($file->file) {
                    $file->file->delete();
                }

                $file->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
            }
        } elseif ($file->file) {
            $file->file->delete();
        }

        return redirect()->route('admin.files.index');
    }

    public function show(File $file)
    {
        abort_if(Gate::denies('file_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $file->load('pages', 'news', 'category');

        return view('admin.files.show', compact('file'));
    }

    public function destroy(File $file)
    {
        abort_if(Gate::denies('file_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $file->delete();

        return back();
    }

    public function massDestroy(MassDestroyFileRequest $request)
    {
        File::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('file_create') && Gate::denies('file_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new File();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
