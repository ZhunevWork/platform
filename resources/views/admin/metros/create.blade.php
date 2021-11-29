@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.metro.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.metros.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="station">{{ trans('cruds.metro.fields.station') }}</label>
                <input class="form-control {{ $errors->has('station') ? 'is-invalid' : '' }}" type="text" name="station" id="station" value="{{ old('station', '') }}">
                @if($errors->has('station'))
                    <div class="invalid-feedback">
                        {{ $errors->first('station') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.metro.fields.station_helper') }}</span>
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