@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.setting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.id') }}
                        </th>
                        <td>
                            {{ $setting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.name') }}
                        </th>
                        <td>
                            {{ $setting->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.logotype') }}
                        </th>
                        <td>
                            @if($setting->logotype)
                                <a href="{{ $setting->logotype->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $setting->logotype->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.logotype_seceond') }}
                        </th>
                        <td>
                            @if($setting->logotype_seceond)
                                <a href="{{ $setting->logotype_seceond->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $setting->logotype_seceond->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.address') }}
                        </th>
                        <td>
                            {{ $setting->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.phone') }}
                        </th>
                        <td>
                            {{ $setting->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.telegram') }}
                        </th>
                        <td>
                            {{ $setting->telegram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.whatsapp') }}
                        </th>
                        <td>
                            {{ $setting->whatsapp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.presentation') }}
                        </th>
                        <td>
                            @if($setting->presentation)
                                <a href="{{ $setting->presentation->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection