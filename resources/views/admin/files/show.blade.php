@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.file.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.files.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.file.fields.id') }}
                        </th>
                        <td>
                            {{ $file->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.file.fields.title') }}
                        </th>
                        <td>
                            {{ $file->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.file.fields.slug') }}
                        </th>
                        <td>
                            {{ $file->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.file.fields.file') }}
                        </th>
                        <td>
                            @if($file->file)
                                <a href="{{ $file->file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.file.fields.pages') }}
                        </th>
                        <td>
                            @foreach($file->pages as $key => $pages)
                                <span class="label label-info">{{ $pages->title . ' (' . $pages->slug . ')' }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.file.fields.news') }}
                        </th>
                        <td>
                            @foreach($file->news as $key => $news)
                                <span class="label label-info">{{ $news->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.file.fields.category') }}
                        </th>
                        <td>
                            {{ $file->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.file.fields.display_order') }}
                        </th>
                        <td>
                            {{ $file->display_order }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.files.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection