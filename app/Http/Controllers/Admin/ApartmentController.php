<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyApartmentRequest;
use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use App\Models\Apartment;
use App\Models\Complex;
use App\Models\Status;
use App\Models\Type;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ApartmentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('apartment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $apartments = Apartment::with(['complex', 'type', 'status', 'media'])->get();

        return view('admin.apartments.index', compact('apartments'));
    }

    public function create()
    {
        abort_if(Gate::denies('apartment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $complexes = Complex::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $types = Type::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = Status::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.apartments.create', compact('complexes', 'types', 'statuses'));
    }

    public function store(StoreApartmentRequest $request)
    {
        $apartment = Apartment::create($request->all());

        foreach ($request->input('photo', []) as $file) {
            $apartment->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $apartment->id]);
        }

        return redirect()->route('admin.apartments.index');
    }

    public function edit(Apartment $apartment)
    {
        abort_if(Gate::denies('apartment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $complexes = Complex::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $types = Type::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = Status::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $apartment->load('complex', 'type', 'status');

        return view('admin.apartments.edit', compact('complexes', 'types', 'statuses', 'apartment'));
    }

    public function update(UpdateApartmentRequest $request, Apartment $apartment)
    {
        $apartment->update($request->all());

        if (count($apartment->photo) > 0) {
            foreach ($apartment->photo as $media) {
                if (!in_array($media->file_name, $request->input('photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $apartment->photo->pluck('file_name')->toArray();
        foreach ($request->input('photo', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $apartment->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
            }
        }

        return redirect()->route('admin.apartments.index');
    }

    public function show(Apartment $apartment)
    {
        abort_if(Gate::denies('apartment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $apartment->load('complex', 'type', 'status');

        return view('admin.apartments.show', compact('apartment'));
    }

    public function destroy(Apartment $apartment)
    {
        abort_if(Gate::denies('apartment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $apartment->delete();

        return back();
    }

    public function massDestroy(MassDestroyApartmentRequest $request)
    {
        Apartment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('apartment_create') && Gate::denies('apartment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Apartment();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
