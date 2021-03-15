<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Http\Resources\Admin\LinkResource;
use App\Models\Link;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LinksApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('link_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LinkResource(Link::with(['pages', 'news', 'category'])->get());
    }

    public function store(StoreLinkRequest $request)
    {
        $link = Link::create($request->all());
        $link->pages()->sync($request->input('pages', []));
        $link->news()->sync($request->input('news', []));

        return (new LinkResource($link))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Link $link)
    {
        abort_if(Gate::denies('link_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LinkResource($link->load(['pages', 'news', 'category']));
    }

    public function update(UpdateLinkRequest $request, Link $link)
    {
        $link->update($request->all());
        $link->pages()->sync($request->input('pages', []));
        $link->news()->sync($request->input('news', []));

        return (new LinkResource($link))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Link $link)
    {
        abort_if(Gate::denies('link_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $link->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
