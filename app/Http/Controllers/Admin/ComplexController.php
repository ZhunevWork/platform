<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyComplexRequest;
use App\Http\Requests\StoreComplexRequest;
use App\Http\Requests\UpdateComplexRequest;
use App\Models\Complex;
use App\Models\Infrastructure;
use App\Models\Metro;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ComplexController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('complex_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $complexes = Complex::with(['stations', 'infrastructures', 'media'])->get();

        return view('admin.complexes.index', compact('complexes'));
    }

    public function create()
    {
        abort_if(Gate::denies('complex_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stations = Metro::pluck('station', 'id');

        $infrastructures = Infrastructure::pluck('address', 'id');

        return view('admin.complexes.create', compact('stations', 'infrastructures'));
    }

    public function store(StoreComplexRequest $request)
    {
        $complex = Complex::create($request->all());
        $complex->stations()->sync($request->input('stations', []));
        $complex->infrastructures()->sync($request->input('infrastructures', []));
        foreach ($request->input('photo', []) as $file) {
            $complex->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $complex->id]);
        }

        return redirect()->route('admin.complexes.index');
    }

    public function edit(Complex $complex)
    {
        abort_if(Gate::denies('complex_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stations = Metro::pluck('station', 'id');

        $infrastructures = Infrastructure::pluck('address', 'id');

        $complex->load('stations', 'infrastructures');

        return view('admin.complexes.edit', compact('stations', 'infrastructures', 'complex'));
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

        return redirect()->route('admin.complexes.index');
    }

    public function show(Complex $complex)
    {
        abort_if(Gate::denies('complex_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $complex->load('stations', 'infrastructures');

        return view('admin.complexes.show', compact('complex'));
    }

    public function destroy(Complex $complex)
    {
        abort_if(Gate::denies('complex_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $complex->delete();

        return back();
    }

    public function massDestroy(MassDestroyComplexRequest $request)
    {
        Complex::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('complex_create') && Gate::denies('complex_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Complex();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
