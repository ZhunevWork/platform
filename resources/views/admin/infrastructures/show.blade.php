@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.infrastructure.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.infrastructures.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.infrastructure.fields.id') }}
                        </th>
                        <td>
                            {{ $infrastructure->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.infrastructure.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Infrastructure::TYPE_SELECT[$infrastructure->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.infrastructure.fields.address') }}
                        </th>
                        <td>
                            {{ $infrastructure->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.infrastructure.fields.distance') }}
                        </th>
                        <td>
                            {{ $infrastructure->distance }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.infrastructures.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection