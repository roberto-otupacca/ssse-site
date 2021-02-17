@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.link.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.links.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.link.fields.id') }}
                        </th>
                        <td>
                            {{ $link->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.link.fields.title') }}
                        </th>
                        <td>
                            {{ $link->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.link.fields.link') }}
                        </th>
                        <td>
                            {{ $link->link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.link.fields.pages') }}
                        </th>
                        <td>
                            @foreach($link->pages as $key => $pages)
                                <span class="label label-info">{{ $pages->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.link.fields.category') }}
                        </th>
                        <td>
                            {{ $link->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.link.fields.display_order') }}
                        </th>
                        <td>
                            {{ $link->display_order }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.links.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection