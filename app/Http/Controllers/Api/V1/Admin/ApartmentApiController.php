<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use App\Http\Resources\Admin\ApartmentResource;
use App\Models\Apartment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApartmentApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('apartment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ApartmentResource(Apartment::with(['complex', 'type', 'status'])->get());
    }

    public function store(StoreApartmentRequest $request)
    {
        $apartment = Apartment::create($request->all());

        foreach ($request->input('photo', []) as $file) {
            $apartment->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
        }

        return (new ApartmentResource($apartment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Apartment $apartment)
    {
        abort_if(Gate::denies('apartment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ApartmentResource($apartment->load(['complex', 'type', 'status']));
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

        return (new ApartmentResource($apartment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Apartment $apartment)
    {
        abort_if(Gate::denies('apartment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $apartment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
