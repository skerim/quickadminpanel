@can('liny_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.linies.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.liny.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.liny.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-craneLinies">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.liny.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.liny.fields.diameter') }}
                        </th>
                        <th>
                            {{ trans('cruds.liny.fields.dostawca') }}
                        </th>
                        <th>
                            {{ trans('cruds.liny.fields.crane') }}
                        </th>
                        <th>
                            {{ trans('cruds.crane.fields.udt') }}
                        </th>
                        <th>
                            {{ trans('cruds.crane.fields.enova') }}
                        </th>
                        <th>
                            {{ trans('cruds.liny.fields.length') }}
                        </th>
                        <th>
                            {{ trans('cruds.liny.fields.certificate') }}
                        </th>
                        <th>
                            {{ trans('cruds.liny.fields.certificate_file') }}
                        </th>
                        <th>
                            {{ trans('cruds.liny.fields.stan') }}
                        </th>
                        <th>
                            {{ trans('cruds.liny.fields.comments') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($linies as $key => $liny)
                        <tr data-entry-id="{{ $liny->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $liny->id ?? '' }}
                            </td>
                            <td>
                                {{ $liny->diameter ?? '' }}
                            </td>
                            <td>
                                {{ $liny->dostawca ?? '' }}
                            </td>
                            <td>
                                {{ $liny->crane->sn ?? '' }}
                            </td>
                            <td>
                                {{ $liny->crane->udt ?? '' }}
                            </td>
                            <td>
                                {{ $liny->crane->enova ?? '' }}
                            </td>
                            <td>
                                {{ $liny->length ?? '' }}
                            </td>
                            <td>
                                {{ $liny->certificate ?? '' }}
                            </td>
                            <td>
                                @if($liny->certificate_file)
                                    <a href="{{ $liny->certificate_file->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $liny->stan ?? '' }}
                            </td>
                            <td>
                                {{ $liny->comments ?? '' }}
                            </td>
                            <td>
                                @can('liny_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.linies.show', $liny->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('liny_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.linies.edit', $liny->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('liny_delete')
                                    <form action="{{ route('admin.linies.destroy', $liny->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('liny_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.linies.massDestroy') }}",
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
  let table = $('.datatable-craneLinies:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection