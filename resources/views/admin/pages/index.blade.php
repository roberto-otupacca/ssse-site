@extends('layouts.admin')
@section('content')

@can('page_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <h2 class="d-inline-block align-middle">{{ trans('cruds.page.title_singular') }}</h2>
            <a class="btn btn-success float-right" href="{{ route('admin.pages.create') }}">
                {{ trans('global.add') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-7">
                @php $NodeId = null; @endphp
                @if($pages->whereNull('parent_id')->count() > 0)
                    <ul id="myUL">
                        <li>
                            <span class="btn btn-primary btn-xs all-tree" style="margin-bottom: 9px;">
                                <i class="fas fa-expand"></i>
                            </span>
                            <span class="caret" style= "font-size: 22px">{{ trans('cruds.page.title_tree') }}</span>
                            @include('admin.pages.recursivePages')
                        <li>
                    </ul>
                @endif
            </div>
            <div class="col-5">
            </div>
        </div>
    </div>
</div>

{{-- @can('page_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <h2 class="d-inline-block align-middle">{{ trans('cruds.page.title_singular') }}</h2>
            <a class="btn btn-success float-right" href="{{ route('admin.pages.create') }}">
                {{ trans('global.add') }}
            </a>
        </div>
    </div>
@endcan --}}
<div class="card">
    {{-- <div class="card-header">
        {{ trans('cruds.page.title_singular') }} {{ trans('global.list') }}
    </div> --}}

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-striped table-hover datatable datatable-Page">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.page.fields.parent') }}
                        </th>
                        <th>
                            {{ trans('cruds.page.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.page.fields.slug') }}
                        </th>
                        <th>
                            {{ trans('cruds.page.fields.draft') }}
                        </th>
                        <th>
                            {{ trans('cruds.page.fields.menu_top') }}
                        </th>
                        <th>
                            {{ trans('cruds.page.fields.menu_right') }}
                        </th>
                        <th>
                            {{ trans('cruds.page.fields.color') }}
                        </th>
                        <th>
                            {{ trans('cruds.page.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.page.fields.display_order') }}
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
                                @foreach($pages as $key => $item)
                                    <option value="{{ $item->title }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search" style="width: 55px !important;">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($colors as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                            {{-- <input class="search" type="text" placeholder="{{ trans('global.search') }}"> --}}
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pages as $key => $page)
                        <tr data-entry-id="{{ $page->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $page->parent->title ?? '' }}
                            </td>
                            <td>
                                {{ $page->title ?? '' }}
                            </td>
                            <td>
                                {{ $page->slug ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $page->draft ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $page->draft ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $page->menu_top ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $page->menu_top ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $page->menu_right ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $page->menu_right ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $page->color->name ?? '' }}
                            </td>
                            <td>
                                @foreach($page->photo as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $page->display_order ?? '' }}
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{url('/'.$page->slug)}}" target="blank" class="btn btn-xs btn-secondary"">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                    @can('page_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.pages.show', $page->id) }}">
                                            <i class="fas fa-info fa-sm"></i>
                                            {{-- {{ trans('global.view') }} --}}
                                        </a>
                                    @endcan

                                    @can('page_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.pages.edit', $page->id) }}">
                                            <i class="far fa-edit fa-sm"></i>
                                            {{-- {{ trans('global.edit') }} --}}
                                        </a>
                                    @endcan

                                    @can('page_delete')
                                        <form action="{{ route('admin.pages.destroy', $page->id) }}"
                                                method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                >
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
@can('page_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pages.massDestroy') }}",
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
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Page:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
