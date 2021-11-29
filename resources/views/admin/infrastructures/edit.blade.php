@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.infrastructure.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.infrastructures.update", [$infrastructure->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.infrastructure.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type">
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Infrastructure::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', $infrastructure->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.infrastructure.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.infrastructure.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $infrastructure->address) }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.infrastructure.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="distance">{{ trans('cruds.infrastructure.fields.distance') }}</label>
                <input class="form-control {{ $errors->has('distance') ? 'is-invalid' : '' }}" type="text" name="distance" id="distance" value="{{ old('distance', $infrastructure->distance) }}">
                @if($errors->has('distance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('distance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.infrastructure.fields.distance_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection