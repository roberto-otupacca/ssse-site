@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.category.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.id') }}
                        </th>
                        <td>
                            {{ $category->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.name') }}
                        </th>
                        <td>
                            {{ $category->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.description') }}
                        </th>
                        <td>
                            {{ $category->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.color') }}
                        </th>
                        <td>
                            {{ $category->color->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.categories.index') }}">
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
            <a class="nav-link" href="#category_links" role="tab" data-toggle="tab">
                {{ trans('cruds.link.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#category_news" role="tab" data-toggle="tab">
                {{ trans('cruds.news.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#category_files" role="tab" data-toggle="tab">
                {{ trans('cruds.file.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="category_links">
            @includeIf('admin.categories.relationships.categoryLinks', ['links' => $category->categoryLinks])
        </div>
        <div class="tab-pane" role="tabpanel" id="category_news">
            @includeIf('admin.categories.relationships.categoryNews', ['news' => $category->categoryNews])
        </div>
        <div class="tab-pane" role="tabpanel" id="category_files">
            @includeIf('admin.categories.relationships.categoryFiles', ['files' => $category->categoryFiles])
        </div>
    </div>
</div>

@endsection