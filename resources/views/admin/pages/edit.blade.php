@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.page.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pages.update", [$page->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="parent_id">{{ trans('cruds.page.fields.parent') }}</label>
                <select class="form-control select2 {{ $errors->has('parent') ? 'is-invalid' : '' }}" name="parent_id" id="parent_id">
                    @foreach($parents as $id => $parent)
                        <option value="{{ $id }}" {{ (old('parent_id') ? old('parent_id') : $page->parent->id ?? '') == $id ? 'selected' : '' }}>{{ $parent }}</option>
                    @endforeach
                </select>
                @if($errors->has('parent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('parent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.parent_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.page.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $page->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="slug">{{ trans('cruds.page.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', $page->slug) }}" required>
                @if($errors->has('slug'))
                    <div class="invalid-feedback">
                        {{ $errors->first('slug') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.slug_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="text">{{ trans('cruds.page.fields.text') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('text') ? 'is-invalid' : '' }}" name="text" id="text">{!! old('text', $page->text) !!}</textarea>
                @if($errors->has('text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.text_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('draft') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="draft" value="0">
                    <input class="form-check-input" type="checkbox" name="draft" id="draft" value="1" {{ $page->draft || old('draft', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="draft">{{ trans('cruds.page.fields.draft') }}</label>
                </div>
                @if($errors->has('draft'))
                    <div class="invalid-feedback">
                        {{ $errors->first('draft') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.draft_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('menu_top') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="menu_top" value="0">
                    <input class="form-check-input" type="checkbox" name="menu_top" id="menu_top" value="1" {{ $page->menu_top || old('menu_top', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="menu_top">{{ trans('cruds.page.fields.menu_top') }}</label>
                </div>
                @if($errors->has('menu_top'))
                    <div class="invalid-feedback">
                        {{ $errors->first('menu_top') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.menu_top_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('menu_right') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="menu_right" value="0">
                    <input class="form-check-input" type="checkbox" name="menu_right" id="menu_right" value="1" {{ $page->menu_right || old('menu_right', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="menu_right">{{ trans('cruds.page.fields.menu_right') }}</label>
                </div>
                @if($errors->has('menu_right'))
                    <div class="invalid-feedback">
                        {{ $errors->first('menu_right') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.menu_right_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="color_id">{{ trans('cruds.page.fields.color') }}</label>
                <select class="form-control select2 {{ $errors->has('color') ? 'is-invalid' : '' }}" name="color_id" id="color_id">
                    @foreach($colors as $id => $color)
                        <option value="{{ $id }}" {{ (old('color_id') ? old('color_id') : $page->color->id ?? '') == $id ? 'selected' : '' }}>{{ $color }}</option>
                    @endforeach
                </select>
                @if($errors->has('color'))
                    <div class="invalid-feedback">
                        {{ $errors->first('color') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.color_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.page.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="display_order">{{ trans('cruds.page.fields.display_order') }}</label>
                <input class="form-control {{ $errors->has('display_order') ? 'is-invalid' : '' }}" type="number" name="display_order" id="display_order" value="{{ old('display_order', $page->display_order) }}" step="1" required>
                @if($errors->has('display_order'))
                    <div class="invalid-feedback">
                        {{ $errors->first('display_order') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.display_order_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/pages/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $page->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

//   var allEditors = document.querySelectorAll('.ckeditor');
//   for (var i = 0; i < allEditors.length; ++i) {
//     ClassicEditor.create(
//       allEditors[i], {
//         extraPlugins: [SimpleUploadAdapter]
//       }
//     );
//   }
  
  
  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter],
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 
                'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed',  '|', 'undo', 'redo' ],
        // toolbar: {
        //     items: [
        //         'heading', '|','fontfamily', 'fontsize', '|','alignment', '|','fontColor', 'fontBackgroundColor', '|','bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
        //         'link', '|','outdent', 'indent', '|','bulletedList', 'numberedList', 'todoList', '|',
        //         'code', 'codeBlock', '|','insertTable', '|','uploadImage', 'blockQuote', '|','undo', 'redo'
        //     ],
        //     shouldNotGroupWhenFull: true
        // },
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' }
            ]
        }
      }
    );
  }

});
</script>

<script>
    var uploadedPhotoMap = {}
Dropzone.options.photoDropzone = {
    url: '{{ route('admin.pages.storeMedia') }}',
    maxFilesize: 8, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 8,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photo[]" value="' + response.name + '">')
      uploadedPhotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotoMap[file.name]
      }
      $('form').find('input[name="photo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($page) && $page->photo)
      var files = {!! json_encode($page->photo) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photo[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection