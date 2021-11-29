<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySettingRequest;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SettingsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $settings = Setting::with(['media'])->get();

        return view('admin.settings.index', compact('settings'));
    }

    public function create()
    {
        abort_if(Gate::denies('setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.create');
    }

    public function store(StoreSettingRequest $request)
    {
        $setting = Setting::create($request->all());

        if ($request->input('logotype', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('logotype'))))->toMediaCollection('logotype');
        }

        if ($request->input('logotype_seceond', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('logotype_seceond'))))->toMediaCollection('logotype_seceond');
        }

        if ($request->input('presentation', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('presentation'))))->toMediaCollection('presentation');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $setting->id]);
        }

        return redirect()->route('admin.settings.index');
    }

    public function edit(Setting $setting)
    {
        abort_if(Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $setting->update($request->all());

        if ($request->input('logotype', false)) {
            if (!$setting->logotype || $request->input('logotype') !== $setting->logotype->file_name) {
                if ($setting->logotype) {
                    $setting->logotype->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('logotype'))))->toMediaCollection('logotype');
            }
        } elseif ($setting->logotype) {
            $setting->logotype->delete();
        }

        if ($request->input('logotype_seceond', false)) {
            if (!$setting->logotype_seceond || $request->input('logotype_seceond') !== $setting->logotype_seceond->file_name) {
                if ($setting->logotype_seceond) {
                    $setting->logotype_seceond->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('logotype_seceond'))))->toMediaCollection('logotype_seceond');
            }
        } elseif ($setting->logotype_seceond) {
            $setting->logotype_seceond->delete();
        }

        if ($request->input('presentation', false)) {
            if (!$setting->presentation || $request->input('presentation') !== $setting->presentation->file_name) {
                if ($setting->presentation) {
                    $setting->presentation->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('presentation'))))->toMediaCollection('presentation');
            }
        } elseif ($setting->presentation) {
            $setting->presentation->delete();
        }

        return redirect()->route('admin.settings.index');
    }

    public function show(Setting $setting)
    {
        abort_if(Gate::denies('setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.show', compact('setting'));
    }

    public function destroy(Setting $setting)
    {
        abort_if(Gate::denies('setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setting->delete();

        return back();
    }

    public function massDestroy(MassDestroySettingRequest $request)
    {
        Setting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('setting_create') && Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Setting();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
