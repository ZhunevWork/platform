<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreComplexRequest;
use App\Http\Requests\UpdateComplexRequest;
use App\Http\Resources\Admin\ComplexResource;
use App\Models\Complex;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ComplexApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('complex_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ComplexResource(Complex::with(['stations', 'infrastructures'])->get());
    }

    public function store(StoreComplexRequest $request)
    {
        $complex = Complex::create($request->all());
        $complex->stations()->sync($request->input('stations', []));
        $complex->infrastructures()->sync($request->input('infrastructures', []));
        foreach ($request->input('photo', []) as $file) {
            $complex->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
        }

        return (new ComplexResource($complex))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Complex $complex)
    {
        abort_if(Gate::denies('complex_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ComplexResource($complex->load(['stations', 'infrastructures']));
    }

    public function update(UpdateComplexRequest $request, Complex $complex)
    {
        $complex->update($request->all());
        $complex->stations()->sync($request->input('stations', []));
        $complex->infrastructures()->sync($request->input('infrastructures', []));
        if (count($complex->photo) > 0) {
            foreach ($complex->photo as $media) {
                if (!in_array($media->file_name, $request->input('photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $complex->photo->pluck('file_name')->toArray();
        foreach ($request->input('photo', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $complex->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
            }
        }

        return (new ComplexResource($complex))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Complex $complex)
    {
        abort_if(Gate::denies('complex_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $complex->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
