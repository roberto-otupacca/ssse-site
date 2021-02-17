@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.color.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.colors.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.color.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.color.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="css_name">{{ trans('cruds.color.fields.css_name') }}</label>
                <input class="form-control {{ $errors->has('css_name') ? 'is-invalid' : '' }}" type="text" name="css_name" id="css_name" value="{{ old('css_name', '') }}" required>
                @if($errors->has('css_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('css_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.color.fields.css_name_helper') }}</span>
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