@extends('layouts.admin')
@section('content')
@can('zawiesium_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.zawiesia.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.zawiesium.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.zawiesium.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Zawiesium">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.zawiesium.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.zawiesium.fields.nr') }}
                        </th>
                        <th>
                            {{ trans('cruds.zawiesium.fields.klasa') }}
                        </th>
                        <th>
                            {{ trans('cruds.zawiesium.fields.expiration_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.zawiesium.fields.certificate_file') }}
                        </th>
                        <th>
                            {{ trans('cruds.zawiesium.fields.load') }}
                        </th>
                        <th>
                            {{ trans('cruds.zawiesium.fields.length') }}
                        </th>
                        <th>
                            {{ trans('cruds.zawiesium.fields.crane') }}
                        </th>
                        <th>
                            {{ trans('cruds.zawiesium.fields.type') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($zawiesia as $key => $zawiesium)
                        <tr data-entry-id="{{ $zawiesium->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $zawiesium->id ?? '' }}
                            </td>
                            <td>
                                {{ $zawiesium->nr ?? '' }}
                            </td>
                            <td>
                                {{ $zawiesium->klasa ?? '' }}
                            </td>
                            <td>
                                {{ $zawiesium->expiration_date ?? '' }}
                            </td>
                            <td>
                                @if($zawiesium->certificate_file)
                                    <a href="{{ $zawiesium->certificate_file->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $zawiesium->load ?? '' }}
                            </td>
                            <td>
                                {{ $zawiesium->length ?? '' }}
                            </td>
                            <td>
                                {{ $zawiesium->crane->sn ?? '' }}
                            </td>
                            <td>
                                {{ $zawiesium->type ?? '' }}
                            </td>
                            <td>
                                @can('zawiesium_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.zawiesia.show', $zawiesium->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('zawiesium_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.zawiesia.edit', $zawiesium->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('zawiesium_delete')
                                    <form action="{{ route('admin.zawiesia.destroy', $zawiesium->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('zawiesium_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.zawiesia.massDestroy') }}",
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
  let table = $('.datatable-Zawiesium:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection