@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.complex.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.complexes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.complex.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.complex.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.complex.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.complex.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price">{{ trans('cruds.complex.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="text" name="price" id="price" value="{{ old('price', '') }}">
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.complex.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="area">{{ trans('cruds.complex.fields.area') }}</label>
                <input class="form-control {{ $errors->has('area') ? 'is-invalid' : '' }}" type="text" name="area" id="area" value="{{ old('area', '') }}">
                @if($errors->has('area'))
                    <div class="invalid-feedback">
                        {{ $errors->first('area') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.complex.fields.area_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="height">{{ trans('cruds.complex.fields.height') }}</label>
                <input class="form-control {{ $errors->has('height') ? 'is-invalid' : '' }}" type="text" name="height" id="height" value="{{ old('height', '') }}">
                @if($errors->has('height'))
                    <div class="invalid-feedback">
                        {{ $errors->first('height') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.complex.fields.height_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.complex.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.complex.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="longitude">{{ trans('cruds.complex.fields.longitude') }}</label>
                <input class="form-control {{ $errors->has('longitude') ? 'is-invalid' : '' }}" type="text" name="longitude" id="longitude" value="{{ old('longitude', '') }}">
                @if($errors->has('longitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('longitude') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.complex.fields.longitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="latitude">{{ trans('cruds.complex.fields.latitude') }}</label>
                <input class="form-control {{ $errors->has('latitude') ? 'is-invalid' : '' }}" type="text" name="latitude" id="latitude" value="{{ old('latitude', '') }}">
                @if($errors->has('latitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('latitude') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.complex.fields.latitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="stations">{{ trans('cruds.complex.fields.station') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('stations') ? 'is-invalid' : '' }}" name="stations[]" id="stations" multiple>
                    @foreach($stations as $id => $station)
                        <option value="{{ $id }}" {{ in_array($id, old('stations', [])) ? 'selected' : '' }}>{{ $station }}</option>
                    @endforeach
                </select>
                @if($errors->has('stations'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stations') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.complex.fields.station_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="infrastructures">{{ trans('cruds.complex.fields.infrastructure') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('infrastructures') ? 'is-invalid' : '' }}" name="infrastructures[]" id="infrastructures" multiple>
                    @foreach($infrastructures as $id => $infrastructure)
                        <option value="{{ $id }}" {{ in_array($id, old('infrastructures', [])) ? 'selected' : '' }}>{{ $infrastructure }}</option>
                    @endforeach
                </select>
                @if($errors->has('infrastructures'))
                    <div class="invalid-feedback">
                        {{ $errors->first('infrastructures') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.complex.fields.infrastructure_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.complex.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.complex.fields.photo_helper') }}</span>
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
    url: '{{ route('admin.complexes.storeMedia') }}',
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
@if(isset($complex) && $complex->photo)
      var files = {!! json_encode($complex->photo) !!}
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