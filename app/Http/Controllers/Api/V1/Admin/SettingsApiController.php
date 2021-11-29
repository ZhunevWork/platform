<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Http\Resources\Admin\SettingResource;
use App\Models\Setting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SettingsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SettingResource(Setting::all());
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

        return (new SettingResource($setting))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Setting $setting)
    {
        abort_if(Gate::denies('setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SettingResource($setting);
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

        return (new SettingResource($setting))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Setting $setting)
    {
        abort_if(Gate::denies('setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setting->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
