@extends('layouts.admin')
@section('content')
@can('klimatyzacja_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.klimatyzacjas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.klimatyzacja.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.klimatyzacja.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Klimatyzacja">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.klimatyzacja.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.klimatyzacja.fields.crane') }}
                        </th>
                        <th>
                            {{ trans('cruds.klimatyzacja.fields.model') }}
                        </th>
                        <th>
                            {{ trans('cruds.klimatyzacja.fields.data_montazu') }}
                        </th>
                        <th>
                            {{ trans('cruds.klimatyzacja.fields.data_konserwacji') }}
                        </th>
                        <th>
                            {{ trans('cruds.klimatyzacja.fields.comments') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($klimatyzacjas as $key => $klimatyzacja)
                        <tr data-entry-id="{{ $klimatyzacja->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $klimatyzacja->id ?? '' }}
                            </td>
                            <td>
                                {{ $klimatyzacja->crane->sn ?? '' }}
                            </td>
                            <td>
                                {{ $klimatyzacja->model ?? '' }}
                            </td>
                            <td>
                                {{ $klimatyzacja->data_montazu ?? '' }}
                            </td>
                            <td>
                                {{ $klimatyzacja->data_konserwacji ?? '' }}
                            </td>
                            <td>
                                {{ $klimatyzacja->comments ?? '' }}
                            </td>
                            <td>
                                @can('klimatyzacja_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.klimatyzacjas.show', $klimatyzacja->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('klimatyzacja_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.klimatyzacjas.edit', $klimatyzacja->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('klimatyzacja_delete')
                                    <form action="{{ route('admin.klimatyzacjas.destroy', $klimatyzacja->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

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
@can('klimatyzacja_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.klimatyzacjas.massDestroy') }}",
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
  let table = $('.datatable-Klimatyzacja:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection