@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.apartment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.apartments.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.apartment.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apartment.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('in_stock') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="in_stock" value="0">
                    <input class="form-check-input" type="checkbox" name="in_stock" id="in_stock" value="1" {{ old('in_stock', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="in_stock">{{ trans('cruds.apartment.fields.in_stock') }}</label>
                </div>
                @if($errors->has('in_stock'))
                    <div class="invalid-feedback">
                        {{ $errors->first('in_stock') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apartment.fields.in_stock_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.apartment.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apartment.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="short_description">{{ trans('cruds.apartment.fields.short_description') }}</label>
                <textarea class="form-control {{ $errors->has('short_description') ? 'is-invalid' : '' }}" name="short_description" id="short_description">{{ old('short_description') }}</textarea>
                @if($errors->has('short_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apartment.fields.short_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="complex_id">{{ trans('cruds.apartment.fields.complex') }}</label>
                <select class="form-control select2 {{ $errors->has('complex') ? 'is-invalid' : '' }}" name="complex_id" id="complex_id">
                    @foreach($complexes as $id => $entry)
                        <option value="{{ $id }}" {{ old('complex_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('complex'))
                    <div class="invalid-feedback">
                        {{ $errors->first('complex') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apartment.fields.complex_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="type_id">{{ trans('cruds.apartment.fields.type') }}</label>
                <select class="form-control select2 {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type_id" id="type_id">
                    @foreach($types as $id => $entry)
                        <option value="{{ $id }}" {{ old('type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apartment.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status_id">{{ trans('cruds.apartment.fields.status') }}</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status_id" id="status_id">
                    @foreach($statuses as $id => $entry)
                        <option value="{{ $id }}" {{ old('status_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apartment.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price">{{ trans('cruds.apartment.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', '') }}" step="1">
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apartment.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price_usd">{{ trans('cruds.apartment.fields.price_usd') }}</label>
                <input class="form-control {{ $errors->has('price_usd') ? 'is-invalid' : '' }}" type="number" name="price_usd" id="price_usd" value="{{ old('price_usd', '') }}" step="1">
                @if($errors->has('price_usd'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price_usd') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apartment.fields.price_usd_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price_eur">{{ trans('cruds.apartment.fields.price_eur') }}</label>
                <input class="form-control {{ $errors->has('price_eur') ? 'is-invalid' : '' }}" type="number" name="price_eur" id="price_eur" value="{{ old('price_eur', '') }}" step="1">
                @if($errors->has('price_eur'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price_eur') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apartment.fields.price_eur_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="floor">{{ trans('cruds.apartment.fields.floor') }}</label>
                <input class="form-control {{ $errors->has('floor') ? 'is-invalid' : '' }}" type="number" name="floor" id="floor" value="{{ old('floor', '') }}" step="1">
                @if($errors->has('floor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('floor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apartment.fields.floor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="all_floor">{{ trans('cruds.apartment.fields.all_floor') }}</label>
                <input class="form-control {{ $errors->has('all_floor') ? 'is-invalid' : '' }}" type="number" name="all_floor" id="all_floor" value="{{ old('all_floor', '') }}" step="1">
                @if($errors->has('all_floor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('all_floor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apartment.fields.all_floor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="area">{{ trans('cruds.apartment.fields.area') }}</label>
                <input class="form-control {{ $errors->has('area') ? 'is-invalid' : '' }}" type="number" name="area" id="area" value="{{ old('area', '') }}" step="1">
                @if($errors->has('area'))
                    <div class="invalid-feedback">
                        {{ $errors->first('area') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apartment.fields.area_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="number_of_rooms">{{ trans('cruds.apartment.fields.number_of_rooms') }}</label>
                <input class="form-control {{ $errors->has('number_of_rooms') ? 'is-invalid' : '' }}" type="number" name="number_of_rooms" id="number_of_rooms" value="{{ old('number_of_rooms', '') }}" step="1">
                @if($errors->has('number_of_rooms'))
                    <div class="invalid-feedback">
                        {{ $errors->first('number_of_rooms') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apartment.fields.number_of_rooms_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="options">{{ trans('cruds.apartment.fields.options') }}</label>
                <input class="form-control {{ $errors->has('options') ? 'is-invalid' : '' }}" type="text" name="options" id="options" value="{{ old('options', '') }}">
                @if($errors->has('options'))
                    <div class="invalid-feedback">
                        {{ $errors->first('options') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apartment.fields.options_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.apartment.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apartment.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="longitude">{{ trans('cruds.apartment.fields.longitude') }}</label>
                <input class="form-control {{ $errors->has('longitude') ? 'is-invalid' : '' }}" type="text" name="longitude" id="longitude" value="{{ old('longitude', '') }}">
                @if($errors->has('longitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('longitude') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apartment.fields.longitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="latitude">{{ trans('cruds.apartment.fields.latitude') }}</label>
                <input class="form-control {{ $errors->has('latitude') ? 'is-invalid' : '' }}" type="text" name="latitude" id="latitude" value="{{ old('latitude', '') }}">
                @if($errors->has('latitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('latitude') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apartment.fields.latitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.apartment.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.apartment.fields.photo_helper') }}</span>
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

@section('scripts')
<script>
    var uploadedPhotoMap = {}
Dropzone.options.photoDropzone = {
    url: '{{ route('admin.apartments.storeMedia') }}',
    maxFilesize: 500, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 500,
      width: 8192,
      height: 8192
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photo[]" value="' + response.name + '">')
      uploadedPhotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotoMap[file.name]
      }
      $('form').find('input[name="photo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($apartment) && $apartment->photo)
      var files = {!! json_encode($apartment->photo) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photo[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection