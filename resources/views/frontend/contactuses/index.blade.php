@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('contact_us_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.contactuses.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.contactUs.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.contactUs.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ContactUs">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactUs.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contactUs.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contactUs.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contactUs.fields.phone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contactUs.fields.details') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contactuses as $key => $contactUs)
                                    <tr data-entry-id="{{ $contactUs->id }}">
                                        <td>
                                            {{ $contactUs->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contactUs->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contactUs->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contactUs->phone ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contactUs->details ?? '' }}
                                        </td>
                                        <td>
                                            @can('contact_us_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.contactuses.show', $contactUs->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan


                                            @can('contact_us_delete')
                                                <form action="{{ route('frontend.contactuses.destroy', $contactUs->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('contact_us_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.contactuses.massDestroy') }}",
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
  let table = $('.datatable-ContactUs:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection