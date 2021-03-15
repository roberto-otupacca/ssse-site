@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.page.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.id') }}
                        </th>
                        <td>
                            {{ $page->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.parent') }}
                        </th>
                        <td>
                            {{ $page->parent->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.title') }}
                        </th>
                        <td>
                            {{ $page->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.slug') }}
                        </th>
                        <td>
                            {{ $page->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.text') }}
                        </th>
                        <td>
                            {!! $page->text !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.draft') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $page->draft ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.menu_top') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $page->menu_top ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.menu_right') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $page->menu_right ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.color') }}
                        </th>
                        <td>
                            {{ $page->color->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.photo') }}
                        </th>
                        <td>
                            @foreach($page->photo as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.display_order') }}
                        </th>
                        <td>
                            {{ $page->display_order }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#pages_files" role="tab" data-toggle="tab">
                {{ trans('cruds.file.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#pages_links" role="tab" data-toggle="tab">
                {{ trans('cruds.link.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="pages_files">
            @includeIf('admin.pages.relationships.pagesFiles', ['files' => $page->pagesFiles])
        </div>
        <div class="tab-pane" role="tabpanel" id="pages_links">
            @includeIf('admin.pages.relationships.pagesLinks', ['links' => $page->pagesLinks])
        </div>
    </div>
</div>

@endsection