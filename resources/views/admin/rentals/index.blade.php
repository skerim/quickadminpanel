@extends('layouts.admin')
@section('content')
@can('rental_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.rentals.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.rental.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.rental.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Rental">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.rental.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.rental.fields.crane') }}
                        </th>
                        <th>
                            {{ trans('cruds.rental.fields.project') }}
                        </th>
                        <th>
                            {{ trans('cruds.rental.fields.rental_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.rental.fields.rental_end') }}
                        </th>
                        <th>
                            {{ trans('cruds.rental.fields.name_crane') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rentals as $key => $rental)
                        <tr data-entry-id="{{ $rental->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $rental->id ?? '' }}
                            </td>
                            <td>
                                @foreach($rental->cranes as $key => $item)
                                    <span class="badge badge-info">{{ $item->sn }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $rental->project->name ?? '' }}
                            </td>
                            <td>
                                {{ $rental->rental_start ?? '' }}
                            </td>
                            <td>
                                {{ $rental->rental_end ?? '' }}
                            </td>
                            <td>
                                {{ $rental->name_crane ?? '' }}
                            </td>
                            <td>
                                @can('rental_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.rentals.show', $rental->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('rental_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.rentals.edit', $rental->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('rental_delete')
                                    <form action="{{ route('admin.rentals.destroy', $rental->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('rental_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.rentals.massDestroy') }}",
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
  let table = $('.datatable-Rental:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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