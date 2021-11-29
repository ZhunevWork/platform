@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.complex.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.complexes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.complex.fields.id') }}
                        </th>
                        <td>
                            {{ $complex->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.complex.fields.name') }}
                        </th>
                        <td>
                            {{ $complex->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.complex.fields.description') }}
                        </th>
                        <td>
                            {{ $complex->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.complex.fields.price') }}
                        </th>
                        <td>
                            {{ $complex->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.complex.fields.area') }}
                        </th>
                        <td>
                            {{ $complex->area }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.complex.fields.height') }}
                        </th>
                        <td>
                            {{ $complex->height }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.complex.fields.address') }}
                        </th>
                        <td>
                            {{ $complex->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.complex.fields.longitude') }}
                        </th>
                        <td>
                            {{ $complex->longitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.complex.fields.latitude') }}
                        </th>
                        <td>
                            {{ $complex->latitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.complex.fields.station') }}
                        </th>
                        <td>
                            @foreach($complex->stations as $key => $station)
                                <span class="label label-info">{{ $station->station }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.complex.fields.infrastructure') }}
                        </th>
                        <td>
                            @foreach($complex->infrastructures as $key => $infrastructure)
                                <span class="label label-info">{{ $infrastructure->address }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.complex.fields.photo') }}
                        </th>
                        <td>
                            @foreach($complex->photo as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.complexes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection