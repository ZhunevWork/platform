@extends('layouts.admin')
@section('content')
@can('complex_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.complexes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.complex.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.complex.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Complex">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.complex.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.complex.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.complex.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.complex.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.complex.fields.area') }}
                        </th>
                        <th>
                            {{ trans('cruds.complex.fields.height') }}
                        </th>
                        <th>
                            {{ trans('cruds.complex.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.complex.fields.longitude') }}
                        </th>
                        <th>
                            {{ trans('cruds.complex.fields.latitude') }}
                        </th>
                        <th>
                            {{ trans('cruds.complex.fields.station') }}
                        </th>
                        <th>
                            {{ trans('cruds.complex.fields.infrastructure') }}
                        </th>
                        <th>
                            {{ trans('cruds.complex.fields.photo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($complexes as $key => $complex)
                        <tr data-entry-id="{{ $complex->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $complex->id ?? '' }}
                            </td>
                            <td>
                                {{ $complex->name ?? '' }}
                            </td>
                            <td>
                                {{ $complex->description ?? '' }}
                            </td>
                            <td>
                                {{ $complex->price ?? '' }}
                            </td>
                            <td>
                                {{ $complex->area ?? '' }}
                            </td>
                            <td>
                                {{ $complex->height ?? '' }}
                            </td>
                            <td>
                                {{ $complex->address ?? '' }}
                            </td>
                            <td>
                                {{ $complex->longitude ?? '' }}
                            </td>
                            <td>
                                {{ $complex->latitude ?? '' }}
                            </td>
                            <td>
                                @foreach($complex->stations as $key => $item)
                                    <span class="badge badge-info">{{ $item->station }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($complex->infrastructures as $key => $item)
                                    <span class="badge badge-info">{{ $item->address }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($complex->photo as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @can('complex_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.complexes.show', $complex->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('complex_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.complexes.edit', $complex->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('complex_delete')
                                    <form action="{{ route('admin.complexes.destroy', $complex->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('complex_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.complexes.massDestroy') }}",
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
  let table = $('.datatable-Complex:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection