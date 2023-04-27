@can('raport_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.raports.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.raport.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.raport.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-craneSnRaports">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.raport.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.raport.fields.crane_sn') }}
                        </th>
                        <th>
                            {{ trans('cruds.raport.fields.data') }}
                        </th>
                        <th>
                            {{ trans('cruds.raport.fields.start') }}
                        </th>
                        <th>
                            {{ trans('cruds.raport.fields.stop') }}
                        </th>
                        <th>
                            {{ trans('cruds.raport.fields.work') }}
                        </th>
                        <th>
                            {{ trans('cruds.raport.fields.engine') }}
                        </th>
                        <th>
                            {{ trans('cruds.raport.fields.gps_kraj') }}
                        </th>
                        <th>
                            {{ trans('cruds.raport.fields.gps_woj') }}
                        </th>
                        <th>
                            {{ trans('cruds.raport.fields.gps_city') }}
                        </th>
                        <th>
                            {{ trans('cruds.raport.fields.gps_ulica') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($raports as $key => $raport)
                        <tr data-entry-id="{{ $raport->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $raport->id ?? '' }}
                            </td>
                            <td>
                                {{ $raport->crane_sn->sn ?? '' }}
                            </td>
                            <td>
                                {{ $raport->data ?? '' }}
                            </td>
                            <td>
                                {{ $raport->start ?? '' }}
                            </td>
                            <td>
                                {{ $raport->stop ?? '' }}
                            </td>
                            <td>
                                {{ $raport->work ?? '' }}
                            </td>
                            <td>
                                {{ $raport->engine ?? '' }}
                            </td>
                            <td>
                                {{ $raport->gps_kraj ?? '' }}
                            </td>
                            <td>
                                {{ $raport->gps_woj ?? '' }}
                            </td>
                            <td>
                                {{ $raport->gps_city ?? '' }}
                            </td>
                            <td>
                                {{ $raport->gps_ulica ?? '' }}
                            </td>
                            <td>
                                @can('raport_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.raports.show', $raport->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('raport_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.raports.edit', $raport->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('raport_delete')
                                    <form action="{{ route('admin.raports.destroy', $raport->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('raport_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.raports.massDestroy') }}",
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
  let table = $('.datatable-craneSnRaports:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection