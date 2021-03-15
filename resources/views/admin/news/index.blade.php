@extends('layouts.admin')
@section('content')
@can('news_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <h2 class="d-inline-block align-middle">{{ trans('cruds.news.title_singular') }}</h2>
            
            <a class="btn btn-success float-right" href="{{ route('admin.news.create') }}">
                {{ trans('global.add') }} 
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <ul id="myUL">
                    <li>
                        <span class="btn btn-primary btn-xs all-tree" style="margin-bottom: 9px;">
                            <i class="fas fa-expand"></i>
                        </span>
                        <span class="caret" style= "font-size: 22px">{{ trans('cruds.news.title_tree') }}</span>

                        <ul class="nested">
                            @foreach($categories->whereIn('id', $news->pluck('category_id')->toArray()) as $category)
                                <li>
                                    <span class="caret"></span>
                                    {{$category->name}}
                                
                                    <ul class="nested">
                                        @foreach($news->where('category_id', $category->id) as $n)
                                            <li>
                                                <a href="{{ route('admin.pages.edit', $n->id) }}" class="tree-element" id="{{$n->id}}">
                                                {{$n->title}}
                                                </a>
                                                <div class="btn-group float" role="group">
                                                    <a href="{{url('/notizia/'.$n->slug)}}" target="blank" class="btn btn-xs btn-secondary"">
                                                        <i class="fas fa-external-link-alt"></i>
                                                    </a>
                                                    {{-- @can('page_show')
                                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.pages.show', $n->id) }}">
                                                            <i class="fas fa-info fa-sm"></i>
                                                        </a>
                                                    @endcan --}}
                            
                                                    {{-- @can('page_edit')
                                                        <a class="btn btn-xs btn-info" href="{{ route('admin.pages.edit', $n->id) }}">
                                                            <i class="far fa-edit fa-sm"></i>
                                                        </a>
                                                    @endcan --}}
                            
                                                    {{-- @can('page_delete')
                                                        <form action="{{ route('admin.pages.destroy', $n->id) }}" 
                                                                method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" 
                                                                >
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            
                                                            <button type="submit"  class="btn btn-xs btn-danger" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px">
                                                                <i class="far fa-trash-alt fa-sm"></i>
                                                            </button>
                                                        </form>
                                                    @endcan --}}
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                
                                </li>
                            @endforeach
                        </ul>
                    <li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="card">
    {{-- <div class="card-header">
        {{ trans('cruds.news.title_singular') }} {{ trans('global.list') }}
    </div> --}}

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-striped table-hover datatable datatable-News">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.news.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.news.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.news.fields.date_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.news.fields.date_end') }}
                        </th>
                        <th>
                            {{ trans('cruds.news.fields.text_color') }}
                        </th>
                        <th>
                            {{ trans('cruds.news.fields.photo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($categories as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\News::TEXT_COLOR_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news as $key => $news)
                        <tr data-entry-id="{{ $news->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $news->category->name ?? '' }}
                            </td>
                            <td>
                                {{ $news->title ?? '' }}
                            </td>
                            <td>
                                {{ $news->date_start ?? '' }}
                            </td>
                            <td>
                                {{ $news->date_end ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\News::TEXT_COLOR_SELECT[$news->text_color] ?? '' }}
                            </td>
                            <td>
                                @foreach($news->photo as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{url('/notizia/'.$news->slug)}}" target="blank" class="btn btn-xs btn-secondary"">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                    @can('news_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.news.show', $news->id) }}">
                                            {{-- {{ trans('global.view') }} --}}
                                            <i class="fas fa-info fa-sm"></i>
                                        </a>
                                    @endcan

                                    @can('news_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.news.edit', $news->id) }}">
                                            {{-- {{ trans('global.edit') }} --}}
                                            <i class="far fa-edit fa-sm"></i>
                                        </a>
                                    @endcan

                                    @can('news_delete')
                                        <form action="{{ route('admin.news.destroy', $news->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            {{-- <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}"> --}}
                                            
                                            <button type="submit"  class="btn btn-xs btn-danger" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px">
                                                <i class="far fa-trash-alt fa-sm"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('news_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.news.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-News:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})


// Visione ad albero
var toggler = document.getElementsByClassName("caret");
var openClose = 1;
var i;

for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function() {
    this.parentElement.querySelector(".nested").classList.toggle("active");
    this.classList.toggle("caret-down");
  });
}

document.getElementsByClassName("all-tree")[0].addEventListener("click", function() {
    for (i = 0; i < toggler.length; i++) {
        if (openClose == 1) {
            toggler[i].parentElement.querySelector(".nested").classList.add("active");
            toggler[i].classList.add("caret-down");
        } else {
            toggler[i].parentElement.querySelector(".nested").classList.remove("active");
            toggler[i].classList.remove("caret-down");
        }
    }
    openClose = -1 * openClose;
  });

</script>
@endsection