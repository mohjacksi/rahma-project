@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('project_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.projects.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.project.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.project.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Project">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.project.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.project.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.project.fields.short_description') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.project.fields.value') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.project.fields.paid') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.project.fields.remain') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.project.fields.donors') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.project.fields.youtube') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.project.fields.images') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.project.fields.category') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.project.fields.reference') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.project.fields.beneficiary') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.project.fields.hide') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $key => $project)
                                    <tr data-entry-id="{{ $project->id }}">
                                        <td>
                                            {{ $project->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $project->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $project->short_description ?? '' }}
                                        </td>
                                        <td>
                                            {{ $project->value ?? '' }}
                                        </td>
                                        <td>
                                            {{ $project->paid ?? '' }}
                                        </td>
                                        <td>
                                            {{ $project->remain ?? '' }}
                                        </td>
                                        <td>
                                            {{ $project->donors ?? '' }}
                                        </td>
                                        <td>
                                            {{ $project->youtube ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($project->images as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl('thumb') }}">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $project->category->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $project->reference ?? '' }}
                                        </td>
                                        <td>
                                            {{ $project->beneficiary ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $project->hide ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $project->hide ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            @can('project_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.projects.show', $project->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('project_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.projects.edit', $project->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('project_delete')
                                                <form action="{{ route('frontend.projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('project_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.projects.massDestroy') }}",
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
  let table = $('.datatable-Project:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection