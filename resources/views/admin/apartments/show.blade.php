@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.apartment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.apartments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.apartment.fields.id') }}
                        </th>
                        <td>
                            {{ $apartment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apartment.fields.name') }}
                        </th>
                        <td>
                            {{ $apartment->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apartment.fields.in_stock') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $apartment->in_stock ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apartment.fields.description') }}
                        </th>
                        <td>
                            {{ $apartment->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apartment.fields.short_description') }}
                        </th>
                        <td>
                            {{ $apartment->short_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apartment.fields.complex') }}
                        </th>
                        <td>
                            {{ $apartment->complex->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apartment.fields.type') }}
                        </th>
                        <td>
                            {{ $apartment->type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apartment.fields.status') }}
                        </th>
                        <td>
                            {{ $apartment->status->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apartment.fields.price') }}
                        </th>
                        <td>
                            {{ $apartment->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apartment.fields.price_usd') }}
                        </th>
                        <td>
                            {{ $apartment->price_usd }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apartment.fields.price_eur') }}
                        </th>
                        <td>
                            {{ $apartment->price_eur }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apartment.fields.floor') }}
                        </th>
                        <td>
                            {{ $apartment->floor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apartment.fields.all_floor') }}
                        </th>
                        <td>
                            {{ $apartment->all_floor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apartment.fields.area') }}
                        </th>
                        <td>
                            {{ $apartment->area }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apartment.fields.number_of_rooms') }}
                        </th>
                        <td>
                            {{ $apartment->number_of_rooms }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apartment.fields.options') }}
                        </th>
                        <td>
                            {{ $apartment->options }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apartment.fields.address') }}
                        </th>
                        <td>
                            {{ $apartment->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apartment.fields.longitude') }}
                        </th>
                        <td>
                            {{ $apartment->longitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apartment.fields.latitude') }}
                        </th>
                        <td>
                            {{ $apartment->latitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apartment.fields.photo') }}
                        </th>
                        <td>
                            @foreach($apartment->photo as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.apartments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection