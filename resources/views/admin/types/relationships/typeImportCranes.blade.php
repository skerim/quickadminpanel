@can('import_crane_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.import-cranes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.importCrane.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.importCrane.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-typeImportCranes">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.importCrane.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.importCrane.fields.producer') }}
                        </th>
                        <th>
                            {{ trans('cruds.importCrane.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.importCrane.fields.sn') }}
                        </th>
                        <th>
                            {{ trans('cruds.importCrane.fields.year') }}
                        </th>
                        <th>
                            {{ trans('cruds.importCrane.fields.max_load') }}
                        </th>
                        <th>
                            {{ trans('cruds.importCrane.fields.udt') }}
                        </th>
                        <th>
                            {{ trans('cruds.importCrane.fields.enova') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($importCranes as $key => $importCrane)
                        <tr data-entry-id="{{ $importCrane->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $importCrane->id ?? '' }}
                            </td>
                            <td>
                                {{ $importCrane->producer->name ?? '' }}
                            </td>
                            <td>
                                {{ $importCrane->type->name ?? '' }}
                            </td>
                            <td>
                                {{ $importCrane->sn->sn ?? '' }}
                            </td>
                            <td>
                                {{ $importCrane->year->year ?? '' }}
                            </td>
                            <td>
                                {{ $importCrane->max_load->max_load ?? '' }}
                            </td>
                            <td>
                                {{ $importCrane->udt->udt ?? '' }}
                            </td>
                            <td>
                                {{ $importCrane->enova->enova ?? '' }}
                            </td>
                            <td>
                                @can('import_crane_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.import-cranes.show', $importCrane->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('import_crane_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.import-cranes.edit', $importCrane->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('import_crane_delete')
                                    <form action="{{ route('admin.import-cranes.destroy', $importCrane->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('import_crane_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.import-cranes.massDestroy') }}",
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
    order: [[ 2, 'asc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-typeImportCranes:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  $('div#sidebar').on('transitionend', function(e) {
    $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
  })
  
})

</script>
@endsection