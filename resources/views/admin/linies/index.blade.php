@extends('layouts.admin')
@section('content')
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
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Liny">
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
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('liny_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.linies.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.linies.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'diameter', name: 'diameter' },
{ data: 'dostawca', name: 'dostawca' },
{ data: 'crane_sn', name: 'crane.sn' },
{ data: 'crane.udt', name: 'crane.udt' },
{ data: 'crane.enova', name: 'crane.enova' },
{ data: 'length', name: 'length' },
{ data: 'certificate', name: 'certificate' },
{ data: 'certificate_file', name: 'certificate_file', sortable: false, searchable: false },
{ data: 'stan', name: 'stan' },
{ data: 'comments', name: 'comments' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Liny').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection