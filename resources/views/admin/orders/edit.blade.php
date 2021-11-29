@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.orders.update", [$order->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="phone">{{ trans('cruds.order.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $order->phone) }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="apartament_id">{{ trans('cruds.order.fields.apartament') }}</label>
                <select class="form-control select2 {{ $errors->has('apartament') ? 'is-invalid' : '' }}" name="apartament_id" id="apartament_id">
                    @foreach($apartaments as $id => $entry)
                        <option value="{{ $id }}" {{ (old('apartament_id') ? old('apartament_id') : $order->apartament->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('apartament'))
                    <div class="invalid-feedback">
                        {{ $errors->first('apartament') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.apartament_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('presentation') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="presentation" value="0">
                    <input class="form-check-input" type="checkbox" name="presentation" id="presentation" value="1" {{ $order->presentation || old('presentation', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="presentation">{{ trans('cruds.order.fields.presentation') }}</label>
                </div>
                @if($errors->has('presentation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('presentation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.presentation_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('worked') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="worked" value="0">
                    <input class="form-check-input" type="checkbox" name="worked" id="worked" value="1" {{ $order->worked || old('worked', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="worked">{{ trans('cruds.order.fields.worked') }}</label>
                </div>
                @if($errors->has('worked'))
                    <div class="invalid-feedback">
                        {{ $errors->first('worked') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.worked_helper') }}</span>
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