@extends('layouts.admin')
@section('content')
@can('color_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <h2 class="d-inline-block align-middle">{{ trans('cruds.color.title_singular') }}</h2>
            <a class="btn btn-success float-right" href="{{ route('admin.colors.create') }}">
                {{ trans('global.add') }} 
            </a>
        </div>
    </div>
@endcan
<div class="card">
    {{-- <div class="card-header">
        {{ trans('cruds.color.title_singular') }} {{ trans('global.list') }}
    </div> --}}

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-striped table-hover datatable datatable-Color">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.color.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.color.fields.css_name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($colors as $key => $color)
                        <tr data-entry-id="{{ $color->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $color->name ?? '' }}
                            </td>
                            <td>
                                {{ $color->css_name ?? '' }}
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    @can('color_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.colors.show', $color->id) }}">
                                            <i class="fas fa-info fa-sm"></i>
                                            {{-- {{ trans('global.view') }} --}}
                                        </a>
                                    @endcan

                                    @can('color_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.colors.edit', $color->id) }}">
                                            <i class="far fa-edit fa-sm"></i>
                                            {{-- {{ trans('global.edit') }} --}}
                                        </a>
                                    @endcan

                                    @can('color_delete')
                                        <form action="{{ route('admin.colors.destroy', $color->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('color_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.colors.massDestroy') }}",
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
  let table = $('.datatable-Color:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection