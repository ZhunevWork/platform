@extends('layouts.admin')
@section('content')
@can('apartment_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.apartments.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.apartment.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.apartment.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Apartment">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.apartment.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.apartment.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.apartment.fields.in_stock') }}
                        </th>
                        <th>
                            {{ trans('cruds.apartment.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.apartment.fields.short_description') }}
                        </th>
                        <th>
                            {{ trans('cruds.apartment.fields.complex') }}
                        </th>
                        <th>
                            {{ trans('cruds.apartment.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.apartment.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.apartment.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.apartment.fields.price_usd') }}
                        </th>
                        <th>
                            {{ trans('cruds.apartment.fields.price_eur') }}
                        </th>
                        <th>
                            {{ trans('cruds.apartment.fields.floor') }}
                        </th>
                        <th>
                            {{ trans('cruds.apartment.fields.all_floor') }}
                        </th>
                        <th>
                            {{ trans('cruds.apartment.fields.area') }}
                        </th>
                        <th>
                            {{ trans('cruds.apartment.fields.number_of_rooms') }}
                        </th>
                        <th>
                            {{ trans('cruds.apartment.fields.options') }}
                        </th>
                        <th>
                            {{ trans('cruds.apartment.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.apartment.fields.longitude') }}
                        </th>
                        <th>
                            {{ trans('cruds.apartment.fields.latitude') }}
                        </th>
                        <th>
                            {{ trans('cruds.apartment.fields.photo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($apartments as $key => $apartment)
                        <tr data-entry-id="{{ $apartment->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $apartment->id ?? '' }}
                            </td>
                            <td>
                                {{ $apartment->name ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $apartment->in_stock ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $apartment->in_stock ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $apartment->description ?? '' }}
                            </td>
                            <td>
                                {{ $apartment->short_description ?? '' }}
                            </td>
                            <td>
                                {{ $apartment->complex->name ?? '' }}
                            </td>
                            <td>
                                {{ $apartment->type->name ?? '' }}
                            </td>
                            <td>
                                {{ $apartment->status->name ?? '' }}
                            </td>
                            <td>
                                {{ $apartment->price ?? '' }}
                            </td>
                            <td>
                                {{ $apartment->price_usd ?? '' }}
                            </td>
                            <td>
                                {{ $apartment->price_eur ?? '' }}
                            </td>
                            <td>
                                {{ $apartment->floor ?? '' }}
                            </td>
                            <td>
                                {{ $apartment->all_floor ?? '' }}
                            </td>
                            <td>
                                {{ $apartment->area ?? '' }}
                            </td>
                            <td>
                                {{ $apartment->number_of_rooms ?? '' }}
                            </td>
                            <td>
                                {{ $apartment->options ?? '' }}
                            </td>
                            <td>
                                {{ $apartment->address ?? '' }}
                            </td>
                            <td>
                                {{ $apartment->longitude ?? '' }}
                            </td>
                            <td>
                                {{ $apartment->latitude ?? '' }}
                            </td>
                            <td>
                                @foreach($apartment->photo as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @can('apartment_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.apartments.show', $apartment->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('apartment_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.apartments.edit', $apartment->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('apartment_delete')
                                    <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('apartment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.apartments.massDestroy') }}",
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
  let table = $('.datatable-Apartment:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection