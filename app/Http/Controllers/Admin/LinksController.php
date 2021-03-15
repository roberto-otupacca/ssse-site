<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLinkRequest;
use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Category;
use App\Models\Link;
use App\Models\News;
use App\Models\Page;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LinksController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('link_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $links = Link::with(['pages', 'news', 'category'])->get();

        $pages = Page::get();

        $news = News::get();

        $categories = Category::get();

        return view('admin.links.index', compact('links', 'pages', 'news', 'categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('link_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $pages = Page::all()->pluck('title', 'id');
        $pages = Page::all();

        $news = News::all()->pluck('title', 'id');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.links.create', compact('pages', 'news', 'categories'));
    }

    public function store(StoreLinkRequest $request)
    {
        $link = Link::create($request->all());
        $link->pages()->sync($request->input('pages', []));
        $link->news()->sync($request->input('news', []));

        return redirect()->route('admin.links.index');
    }

    public function edit(Link $link)
    {
        abort_if(Gate::denies('link_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $pages = Page::all()->pluck('title', 'id');
        $pages = Page::all();

        $news = News::all()->pluck('title', 'id');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $link->load('pages', 'news', 'category');

        return view('admin.links.edit', compact('pages', 'news', 'categories', 'link'));
    }

    public function update(UpdateLinkRequest $request, Link $link)
    {
        $link->update($request->all());
        $link->pages()->sync($request->input('pages', []));
        $link->news()->sync($request->input('news', []));

        return redirect()->route('admin.links.index');
    }

    public function show(Link $link)
    {
        abort_if(Gate::denies('link_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $link->load('pages', 'news', 'category');

        return view('admin.links.show', compact('link'));
    }

    public function destroy(Link $link)
    {
        abort_if(Gate::denies('link_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $link->delete();

        return back();
    }

    public function massDestroy(MassDestroyLinkRequest $request)
    {
        Link::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
