@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.link.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.links.update", [$link->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.link.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $link->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.link.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link">{{ trans('cruds.link.fields.link') }}</label>
                <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{ old('link', $link->link) }}">
                @if($errors->has('link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.link.fields.link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pages">{{ trans('cruds.link.fields.pages') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('pages') ? 'is-invalid' : '' }}" name="pages[]" id="pages" multiple>
                    @foreach($pages->pluck('title', 'id') as $id => $page)
                        <option value="{{ $id }}" {{ (in_array($id, old('pages', [])) || $link->pages->contains($id)) ? 'selected' : '' }}>
                            {{ $page . ' (' . $pages->where('id', $id)->first()->slug . ')'}}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('pages'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pages') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.link.fields.pages_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="news">{{ trans('cruds.link.fields.news') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('news') ? 'is-invalid' : '' }}" name="news[]" id="news" multiple>
                    @foreach($news as $id => $news)
                        <option value="{{ $id }}" {{ (in_array($id, old('news', [])) || $link->news->contains($id)) ? 'selected' : '' }}>{{ $news }}</option>
                    @endforeach
                </select>
                @if($errors->has('news'))
                    <div class="invalid-feedback">
                        {{ $errors->first('news') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.link.fields.news_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="category_id">{{ trans('cruds.link.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id">
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $link->category->id ?? '') == $id ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.link.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="display_order">{{ trans('cruds.link.fields.display_order') }}</label>
                <input class="form-control {{ $errors->has('display_order') ? 'is-invalid' : '' }}" type="number" name="display_order" id="display_order" value="{{ old('display_order', $link->display_order) }}" step="1" required>
                @if($errors->has('display_order'))
                    <div class="invalid-feedback">
                        {{ $errors->first('display_order') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.link.fields.display_order_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection